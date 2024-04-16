<?php
class SortingManager extends Controller
{

	function __construct()
	{
		$this->verify();
	}
	function verify()
	{
		if (Auth::getRole() == "SortingManager") {
			return true;
		} else {
			$this->redirect('login');
		}
	}
	function index()
	{
		$this->view('SortingManager/SortingManager');
	}

	function PendingSortingJobs()
	{
		$jobs = $this->load_model('SortingJobModel');
		$data = $jobs->query("SELECT S.*, M.waste_type, M.Machine_Type FROM sorting_job S JOIN machine M ON S.Machine_ID=M.Machine_ID WHERE S.Status='In_Progress'");
		$this->view('SortingManager/SortingJobs', ['rows' => $data]);
	}
	function SortedJobs()
	{
		$jobs = $this->load_model('SortingJobModel');
		$data = $jobs->where('Status', 'Sorted');
		$this->view('SortingManager/SortedJobs', ['rows' => $data]);
	}

	function CreateSortingJobs()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$inventory = explode(',', $_POST['inventoryIds']);
			if (password_verify($_POST['pwd'], Auth::getpwd())) {
				$Inventory_Model = $this->load_model('InventoryModel');
				$SortingJob_Model = $this->load_model('SortingJobModel');
				$machineModel = $this->load_model('MachineModel');
				//TODO(Remove this quary and get the ID from the form)
				$machine = $machineModel->query("SELECT * FROM machine WHERE waste_type='" . $_POST['waste_type'] . "' AND Machine_Type='" . $_POST['Machine_Type'] . "'");
				$machineModel->update($machine[0]->Machine_ID, ['Is_Sorting' => 1], 'Machine_ID');
				$data = $SortingJob_Model->insert($_POST);
				foreach ($inventory as $row) {
					$arr['Status'] = "Sorting";
					$arr['Sorting_Job_ID'] = $data['Sorting_Job_ID'];
					$Inventory_Model->update($row, $arr, "Inventory_ID");
				}
				$payload = array(
					'Action' => 'CreateSortingJob',
					'Machine_ID'=> $machine[0]->Machine_ID,
					'Sorting_Job_ID' => $data['Sorting_Job_ID'],
					'waste_type' => $_POST['waste_type'],
					'Inventory_IDs' => $inventory
				);
				$mqttController = new MqttController();
				$mqttController->publish('Recycohub', json_encode($payload));
				$mqttController->disconnect();
				message(["Sorting jos successfully initiated", "success"]);
				$this->redirect("SortingManager");
			} else {
				message(["Wrong password", "error"]);
			}
			$this->redirect("SortingManager");
		} else {
			$machinemodel = $this->load_model("MachineModel");
			$machine = $machinemodel->findAll(1, 10, "Machine_ID");
			$this->view('SortingManager/newsortingjob', ["Machines" => $machine]);
		}
	}

	function verifyInventory()
	{
		$id = $_POST['content'];
		$inventory = $this->load_model('InventoryModel');
		header('Content-Type: application/json');
		$inventory = $inventory->where("Inventory_ID", $id)[0];
		if ($inventory != null) {
			if ($inventory->Status == "In_Warehouse") {
				echo json_encode(['success' => true, 'WasteType' => $inventory->waste_type]);
			} else {
				echo json_encode(['success' => false]);
			}
		} else {
			echo json_encode(['success' => false]);
		}
	}

	//function SortedItems()
	//{
	//	$inventory = $this->load_model('InventoryModel');
	//	$data = $inventory->query("
	//    SELECT Type, SUM(Weight) AS total_weight
	//    FROM inventory
	//    GROUP BY Type;", $data = []);
	//	$this->view('Charts/SortedItems', [$data]);
	//}

	//function SortingEfficiency()
	//{
	//	$inventory = $this->load_model('InventoryModel');
	//	$data = $inventory->query("
	//    SELECT Type, SUM(Weight) AS total_weight
	//    FROM inventory
	//    GROUP BY Type;", $data = []);
	//	$this->view('Charts/SortingEfficiency', [$data]);
	//}

	function SortingRate()
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->query("
        SELECT Type, SUM(Weight) AS total_weight
        FROM inventory
        GROUP BY Type;", $data = []);
		$this->view('Charts/SortingRate', [$data]);
	}

	function SortingJobProgress()
	{
		$id = 0;
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			echo "ID parameter is not set in the URL.";
		}
		$sorting = $this->load_model("SortingJobModel");
		$data = $sorting->query("SELECT S.*, M.waste_type, M.Machine_Type FROM sorting_job S JOIN machine M ON S.Machine_ID=M.Machine_ID WHERE S.Sorting_Job_ID='" . $id . "'")[0];
		$inventories = $this->load_model('InventoryModel');
		$data->inventories = $inventories->where("Sorting_Job_ID", $id);
		$data->statusint = statustoint($data->Status);
		$inventory = $this->load_model('InventoryModel');
		$inventory = $inventory->where("Sorting_Job_ID ", $id);
		$this->view('SortingManager/SortingJobInfo', ['data' => $data, 'rows' => $inventory]);
	}

	//Get the data form esp32 module and calculate the credits and assign to the respect customers
	function SortingJobUpdate()
	{
		$inventory = $this->load_model("InventoryModel");
		$prices = $this->load_model('InventoryTypes');
		$items = json_decode($_POST['Weight_After_Sorting'], true);

		// Extract the Type_Name values from $items
		$typeNames = array_keys($items);

		// Construct the IN clause for the SQL query
		$inClause = implode(',', array_map(function ($typeName) {
			return "'" . $typeName . "'";
		}, $typeNames));
		// Use the constructed IN clause in the SQL query
		$query = "SELECT Type_Name, Buying_Price AS Price FROM prices WHERE Type_Name IN ($inClause)";
		$prices = $prices->query($query);
		//var_dump($query, $inClause, $prices);
		$sum = 0;
		$data = array(
			'Inventory_ID' => $_POST['Inventory_ID'],
			'Date' => date('Y-m-d H:i:s'),
			'Items' => array()
		);
		foreach ($prices as &$price) {
			$data["Items"][substr($price->Type_Name, 0, -2)] = array(
				"Weight" => $items[$price->Type_Name],
				"Price" => $price->Price
			);
			$sum = $items[$price->Type_Name] * $price->Price;
		}
		$data = json_encode($data, true);
		//var_dump($_POST, $sum, $data);
		$customer = $this->load_model("CustomerModel");
		$User_ID = $this->load_model("PickUpRequestModel");
		$User_ID = ($User_ID->where("InventoryId", $_POST['Inventory_ID']))[0]->Customer_ID;
		$query = "UPDATE customer SET Credit_History = '$data' WHERE User_ID = '$User_ID';";
		$customer = $customer->query($query);
		//var_dump($query, $User_ID);
		$data = $inventory->update($_POST["Inventory_ID"], $_POST, "Inventory_ID");
	}

	function SortedToInventory()
	{
		$inventory = $this->load_model("InventoryModel");
		$inventory->update($_POST["Inventory_ID"], ["Status" => "In_Warehouse"], "Inventory_ID");
	}
}

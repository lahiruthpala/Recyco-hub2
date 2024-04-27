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
				$machineModel->update($_POST['Machine_ID'], ['Is_Sorting' => 1], 'Machine_ID');
				$data = $SortingJob_Model->insert($_POST);
				foreach ($inventory as $row) {
					$arr['Status'] = "Sorting";
					$arr['Sorting_Job_ID'] = $data['Sorting_Job_ID'];
					$Inventory_Model->update($row, $arr, "Inventory_ID");
				}
				$payload = array(
					'Action' => 'CreateSortingJob',
					'Machine_ID' => $_POST['Machine_ID'],
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
		$inventory = $this->load_model('SortedInventory');
		$inventory = $inventory->where("Sorting_Job_ID ", $id);
		$this->view('SortingManager/SortingJobInfo', ['data' => $data, 'rows' => $inventory]);
	}

	function SortedToInventory()
	{
		$inventory = $this->load_model("InventoryModel");
		$inventory->update($_POST["Inventory_ID"], ["Status" => "In_Warehouse"], "Inventory_ID");
	}

	function getSortingMachine()
	{
		$machine = $this->load_model("MachineModel");
		$machine = $machine->query("SELECT * FROM machine WHERE Is_Sorting = 0 AND Status = 'Operational' AND waste_type='" . $_POST['waste_type'] . "'");
		header('Content-Type: application/json');
		if ($machine == false) {
			echo json_encode("false");
			return;
		} else {
			echo json_encode($machine);
		}
	}

	function SortedInventorySell(){
		$id = 0;
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			echo "ID parameter is not set in the URL.";
		}
		$inventory = $this->load_model("SortedInventory");
		$SI = $inventory->query("SELECT * FROM sorted_inventory SI JOIN sorting_job S ON SI.Sorting_Job_ID=S.Sorting_Job_ID WHERE SI.Inventory_ID = '" . $id ."'")[0];
		$inventory = $inventory->query("SELECT Inventory_ID, Status FROM inventory where Sorting_Job_ID='" . $SI->Sorting_Job_ID ."'");
		$SI->statusint = statustointselling($SI->Status);
		$this->view('Inventory/SortedInventorySell', ['data' => $SI, 'inventory' => $inventory]);
	}
}

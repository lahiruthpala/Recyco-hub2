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
		$data = $jobs->where('Status', "In_Progress");
		$this->view('SortingManager/SortingJobs', ['rows' => $data]);
	}
	function SortedJobs()
	{
		$inventory = $this->load_model('SortingJobModel');
		$data = $inventory->where('Status', 'Sorted');
		$this->view('SortingManager/SortedJobs', ['rows' => $data]);
	}

	function CreateSortingJobs()
	{
		$errors = array();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$inventory = explode(',', $_POST['inventory']);
			if (password_verify($_POST['pwd'], Auth::getpwd())) {
				$Inventory_Model = $this->load_model('InventoryModel');
				$SortingJob_Model = $this->load_model('SortingJobModel');
				foreach ($inventory as $row) {
					$arr['Status'] = "Sorting";
					$Inventory_Model->update($row, $arr, "Inventory_ID");
				}
				$SortingJob_Model->insert($_POST);
				message("Sorting jos successfully initiated");
				$this->redirect("SortingManager");
			} else {
				$errors[] = "Wrong Password";
			}
		} else {
			//$errors[] = "Invalid Input";
		}
		$this->view('SortingManager/newsortingjob', ["errors" => $errors]);
	}

	function verifyInventory()
	{
		$id = $_POST['content'];
		$inventory = $this->load_model('InventoryModel');
		header('Content-Type: application/json');
		if ($inventory->where("Inventory_ID", $id)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}

	function SortedItems()
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->query("
        SELECT Type, SUM(Weight) AS total_weight
        FROM inventory
        GROUP BY Type;", $data = []);
		$this->view('Charts/SortedItems', [$data]);
	}

	function SortingEfficiency()
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->query("
        SELECT Type, SUM(Weight) AS total_weight
        FROM inventory
        GROUP BY Type;", $data = []);
		$this->view('Charts/SortingEfficiency', [$data]);
	}

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
		$data = $sorting->first("Sorting_Job_ID", $id);
		$inventories = $this->load_model('InventoryModel');
		$data->inventories = $inventories->where("Sorting_Job_ID", $id);
		$data->statusint = statustoint($data->Status);
		$inventory = $this->load_model('InventoryModel');
        $inventory = $inventory->where("Sorting_Job_ID ", $id);
		$this->view('SortingManager/SortingJobInfo', ['data' => $data, 'rows'=>$inventory]);
	}

	//Get the data form esp32 module and calculate the credits and assign to the respect customers
	function SortingJobUpdate()
	{
		$inventory = $this->load_model("InventoryModel");
		$prices = $this->load_model('Prices');
		$items = json_decode($_POST['Weight_After_Sorting'], true);

		// Extract the Type_Name values from $items
		$typeNames = array_keys($items);

		// Construct the IN clause for the SQL query
		$inClause = implode(',', array_map(function ($typeName) {
			return "'" . $typeName . "_B'";
		}, $typeNames));
		// Use the constructed IN clause in the SQL query
		$query = "SELECT * FROM prices WHERE Type_Name IN ($inClause)";
		$prices = $prices->query($query);
		var_dump($query, $inClause, $prices);
		$sum = 0;
		$data = array(
			'Inventory_ID'=>$_POST['Inventory_ID'],
			'Date' => date('Y-m-d H:i:s'),
			'Items' => array()
		);
		foreach ($prices as &$price) {
			$data["Items"][substr($price->Type_Name, 0, -2)] = array(
				"Weight" => $items[substr($price->Type_Name, 0, -2)],
				"Price" => $price->Price
			);
			$sum = $items[substr($price->Type_Name, 0, -2)]*$price->Price;
		}
		$data = json_encode($data, true);
		var_dump($_POST, $sum, $data);
		$customer = $this->load_model("CustomerModel");
		$User_ID = $this->load_model("PickUpRequestModel");
		$User_ID = ($User_ID->where("InventoryId", $_POST['Inventory_ID']))[0]->Customer_ID;
		$query = "UPDATE customer SET Credit_History = '$data' WHERE User_ID = '$User_ID';";
		$customer = $customer->query($query);
		var_dump($query, $User_ID);
		$data = $inventory->update($_POST["Inventory_ID"], $_POST, "Inventory_ID");
	}
}

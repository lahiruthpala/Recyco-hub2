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
				die;
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
		var_dump($data);
		die;
		$this->view('SortingManager/SortingJobProgress', ['data' => $data]);
	}
}

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
		$data = $jobs->findAll();
		$this->view('SortingManager/SortingJobs', ['rows' => $data]);
	}
	function SortedJobs()
	{
		$inventory = $this->load_model('Inventory');
		$data = $inventory->where('Status', 'Sorted');
		$this->view('SortingManager/SortedJobs', ['rows' => $data]);
	}

	function CreateSortingJobs()
	{
		$errors = array();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$inventory = explode(',', $_POST['inventory']);
			if (password_verify($_POST['pwd'], Auth::getpwd())) {
				$articles = $this->load_model('Inventory');
				$articles = $this->load_model('SortingJobModel');
				foreach ($inventory as $row) {
					$arr['Status'] = "Sorting";
					$articles->update($row, $arr, "Inventory_ID");
				}
				$articles->insert($_POST);
				$this->redirect("SortingManager");
			} else {
				$errors[] = "Wrong Password";
			}
		} else {
			$errors[] = "Invalid Input";
		}
		$this->view('SortingManager/newsortingjob', ["errors" => $errors]);
	}

	function verifyInventory()
	{
		$id = $_POST['content'];
		$inventory = $this->load_model('Inventory');
		header('Content-Type: application/json');
		if ($inventory->where("Inventory_ID", $id)) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}
}

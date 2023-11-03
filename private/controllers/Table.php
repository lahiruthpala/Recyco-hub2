<?php
class Table extends Controller
{
	function index()
	{
		$inventory = $this->load_model('TableModel');
		$data = $inventory->findAll();
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function PendingSortingJobs()
	{
		$jobs = $this->load_model('SortingJobModel');
		$data = $jobs->findAll();
		$this->view('SortingManager/table', ['rows' => $data]);
	}

	function PendingInventory($BatchID = null)
	{
		$inventory = $this->load_model('TableModel');
		$data = $inventory->where('Status', 'New');
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function InventoryBatch()
	{
		$batch = $this->load_model('GenerateInventoryId');
		$data = $batch->findAll();
		$this->view('GeneralManager/BatchTable', ['rows' => $data]);
	}

	function InventoryBatchDelete($id)
	{
		$batch = $this->load_model('GenerateInventoryId');
		$inventory = $this->load_model('TableModel');
		$batch->delete($id, "Batch_ID");
		$batch->delete($id, "Batch_ID");
		$data = $batch->findAll();
		$this->view('GeneralManager/BatchTable', ['rows' => $data]);
	}

	function RawInventory()
	{
		$inventory = $this->load_model('TableModel');
		$data = $inventory->where('Status', 'InStock');
		$data = array_merge($data, $inventory->where('Status', 'Sorting'));
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function SortedInventory()
	{
		$inventory = $this->load_model('TableModel');
		$data = $inventory->where('Status', 'Sorted');
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function Assign($BatchID = null, $CollecterID = null)
	{
		if (count($_POST) > 0) {
			$this->view("GeneralManager");
		}
		$inventory = $this->load_model('GenerateInventoryId');
		$arr['Status'] = "Assigned";
		$data = $inventory->update($BatchID, $arr, "Batch_ID");
		$colletor = $this->load_model('CollectorModel');
		$data = $colletor->first('Collector_ID', $CollecterID);
		$this->view("Assign", ['data' => $data]);
	}

	function CreateSortingJobs($inventory = null)
	{
		// $inventory = $this->load_model('SortingJobModel');
		if ($inventory == null) {
			$this->view('SortingManager/newsortingjob', ['inventories' => $inventory]);
		} else {
			$inventory = explode(',', $inventory);
			if (count($_POST) > 0) {
				$articles = $this->load_model('TableModel');
				foreach ($inventory as $row) {
					$arr['Status'] = "Sorting";
					$articles->update($row, $arr, "Inventory_ID");
				}
				$articles = $this->load_model('SortingJobModel');
				$articles->insert($_POST);
				$this->redirect("SortingManager");
			}
			$this->view('SortingManager/newsortingjob2', ['inventories' => $inventory]);
		}
	}
	function qr()
	{
		$this->view("Include/qrscaner/index");
	}
	// function table(){
	// 	$this->view("SortingManager/table");
	// }
}

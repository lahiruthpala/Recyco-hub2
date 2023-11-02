<?php
class Table extends Controller
{
	function index()
	{
		$inventory = $this->load_model('TableModel');
		$data = $inventory->findAll();
		$this->view('GeneralManager/Inventory_Table', ['rows'=>$data]);
	}

	function SortingJobs(){
		$jobs = $this->load_model('SortingJobModel');
		$data = $jobs->findAll();
		$this->view('SortingManager/table', ['rows'=>$data]);
	}

	function PendingInventory(){
		$inventory = $this->load_model('TableModel');
		$data = $inventory->where('Status', 'New');
		$this->view('GeneralManager/Inventory_Table', ['rows'=>$data]);
	}

	function InventoryBatch(){
		$batch = $this->load_model('GenerateInventoryId');
		$data = $batch->findAll();
		$this->view('GeneralManager/BatchTable', ['rows'=>$data]);
	}

	function InventoryBatchDelete($id){
		$batch = $this->load_model('GenerateInventoryId');
		$inventory = $this->load_model('TableModel');
		$batch->delete($id, "Batch_ID");
		$batch->delete($id, "Batch_ID");
		$data = $batch->findAll();
		$this->view('GeneralManager/BatchTable', ['rows'=>$data]);
	}

	function RawInventory(){
		$inventory = $this->load_model('TableModel');
		$data = $inventory->where('Status', 'InStock');
		$this->view('GeneralManager/Inventory_Table', ['rows'=>$data]);
	}

	function SortedInventory(){
		$inventory = $this->load_model('TableModel');
		$data = $inventory->where('Status', 'Sorted');
		$this->view('GeneralManager/Inventory_Table', ['rows'=>$data]);
	}

	function Assign($id){
		$inventory = $this->load_model('GenerateInventoryId');
		$arr['Status'] = "Assigned";
		$data = $inventory->update("zYDcNh", $arr);
		$colletor = $this->load_model('CollectorModel');
		$data = $colletor->first('Collector_ID', $id);
		$this->view("Assign", ['data'=>$data]);
	}

	function qr(){
		$this->view("Include/qrscaner/index");
	}

	// function table(){
	// 	$this->view("SortingManager/table");
	// }
}

<?php
class Table extends Controller
{
	function index()
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->findAll();
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function PendingInventory($BatchID = null)
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->where('Status', 'New');
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function InventoryBatchDelete($id)
	{
		$batch = $this->load_model('Batch');
		$inventory = $this->load_model('InventoryModel');
		$batch->delete($id, "Batch_ID");
		$batch->delete($id, "Batch_ID");
		$data = $batch->findAll();
		$this->view('GeneralManager/BatchTable', ['rows' => $data]);
	}

	function RawInventory()
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->where('Status', 'InStock');
		$data = array_merge($data, $inventory->where('Status', 'Sorting'));
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}

	function SortedInventory()
	{
		$inventory = $this->load_model('InventoryModel');
		$data = $inventory->where('Status', 'Sorted');
		$this->view('GeneralManager/Inventory_Table', ['rows' => $data]);
	}
}

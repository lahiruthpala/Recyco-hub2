<?php
class Inventory extends Controller
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
        // code...
        $this->view('GeneralManager/GeneralManager', [
            'errors' => "",
        ]);
    }

    function InventoryBatch()
    {
        $batch = $this->load_model('GenerateInventoryId');
        $data = $batch->findAll(1, 10, "Batch_ID");
        $this->view('Inventory/BatchTable', ['rows' => $data]);
    }

    function SortedInventory()
    {
        $batch = $this->load_model('GenerateInventoryId');
        $data = $batch->findAll();
        $this->view('Inventory/SortedInventory', ['rows' => $data]);
    }

    function RawInventory()
    {
        $batch = $this->load_model('GenerateInventoryId');
        $data = $batch->findAll();
        $this->view('Inventory/RawInventory', ['rows' => $data]);
    }
    function Assign()
	{
		// if (count($_POST) > 0) {
		// 	$this->view("GeneralManager");
		// }
		// $inventory = $this->load_model('GenerateInventoryId');
		// $arr['Status'] = "Assigned";
		// $data = $inventory->update($BatchID, $arr, "Batch_ID");
		// $colletor = $this->load_model('CollectorModel');
		// $data = $colletor->first('Collector_ID', $CollecterID);
        $data = array();
		$this->view("Inventory/InventoryAssign", ['data' => $data]);
	}

    function collectordetails(){
        $collecter = $this->load_model('CollectorModel');
        if(count($_POST) > 0){
            $data = $collecter->first("Collector_ID", $_POST['id']);
            echo json_encode(['success' => $data]);
        }
    }
}

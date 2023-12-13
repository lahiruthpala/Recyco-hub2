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
        if (count($_POST) > 0) {
            $inventory = $this->load_model('GenerateInventoryId');
            $arr['Status'] = "Assigned";
            $data = $inventory->update($_POST, $arr, "Batch_ID");
            $collector = $this->load_model('CollectorModel');
            $data = $collector->first('Collector_ID', $_POST);
        }
        $this->view("Inventory/InventoryAssign");
    }

    function collectordetails()
    {
        $collector = $this->load_model('CollectorModel');
        if (count($_POST) > 0) {
            $data = $collector->first("Collector_ID", $_POST['id']);
            if ($data) {
                echo json_encode(['success' => $data]);
            } else {
                echo json_encode(['error' => 'Data not found']);
            }
        }
    }

    function progress(){
        $inventory = $this->load_model('GenerateInventoryId');
        $data = $inventory->findAll();
        $this->view('Inventory/Progress', ['rows' => $data]);
    }
}

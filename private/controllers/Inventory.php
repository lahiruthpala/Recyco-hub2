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
        var_dump($_POST);
        if (count($_POST) > 0) {
            var_dump($_POST);
            die;
            $inventory = $this->load_model('GenerateInventoryId');
            $arr['Status'] = "Assigned";
            $data = $inventory->update($_POST, $arr, "Batch_ID");
            $colletor = $this->load_model('CollectorModel');
            $data = $colletor->first('Collector_ID', $_POST);
        }
        $this->view("Inventory/InventoryAssign");
    }

    function collectordetails()
    {
        $collecter = $this->load_model('CollectorModel');
        if (count($_POST) > 0) {
            $data = $collecter->first("Collector_ID", $_POST['id']);
            if ($data) {
                // If data is found, encode it into JSON format
                echo json_encode(['success' => $data]);
            } else {
                // If data is not found, you might want to handle this case accordingly
                echo json_encode(['error' => 'Data not found']);
            }
        }
    }
}

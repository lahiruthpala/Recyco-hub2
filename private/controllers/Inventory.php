<?php
class Inventory extends Controller
{
    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        $allowedRoles = ["SortingManager", "GeneralManager", "Admin"];
        if (in_array(Auth::getRole(), $allowedRoles)) {
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
        $batch = $this->load_model('Batch');
        $data = $batch->findAll(1, 10, "Batch_ID");
        $this->view('Inventory/BatchTable', ['rows' => $data]);
    }

    function SortedInventory()
    {
        $batch = $this->load_model('SortedInventory');
        $data = $batch->where("Status", "Sorted");
        $this->view('Inventory/SortedInventory', ['rows' => $data]);
    }

    function RawInventory()
    {
        $batch = $this->load_model('InventoryModel');
        $data = $batch->query("SELECT waste_type, SUM(Weight) Weight FROM inventory WHERE Status = 'In_Warehouse' GROUP BY waste_type;");
        $this->view('Inventory/RawInventory', ['rows' => $data]);
    }

    function RawInventoryInfo()
    {
        if (isset($_GET['waste_type'])) {
            $type = $_GET['waste_type'];
        } else {
            echo "parameters are not set";
        }
        $batch = $this->load_model('InventoryModel');
        $inven_type = $this->load_model("InventoryTypes");
        $inven_type = $inven_type->where("Type_Name", $type);
        $inventory = $batch->query("SELECT * FROM inventory WHERE waste_type='$type' ORDER BY Batch_ID DESC");
        $data = $batch->query("SELECT waste_type, SUM(Weight) Weight FROM inventory WHERE waste_type='$type' GROUP BY waste_type");
        if (isset($inven_type) && $inven_type != null) {
            $data[0]->Description = $inven_type[0]->Description;
            $data[0]->Buying_Price = $inven_type[0]->Buying_Price;
            $data[0]->Selling_Price = $inven_type[0]->Selling_Price;
            $data[0]->Status = $inven_type[0]->Status;
        }
        $this->view('Inventory/RawInventoryInfo', ['data' => $data, 'rows' => $inventory]);
    }

    function Assign()
    {
        if (count($_POST) > 0) {
            $arr['Status'] = "Assigned";
            $inventory = $this->load_model('InventoryModel');
            $inventory->update($_POST["BatchID"], $arr, "Batch_ID");
            $inventory = $this->load_model('Batch');
            $arr['Collector_ID'] = $_POST["Collector_ID"];
            $data = $inventory->update($_POST["BatchID"], $arr, "Batch_ID");
            $this->redirect("/GeneralManager");
        }
        $this->view("Inventory/InventoryAssign");
    }

    function collectordetails()
    {
        $collector = $this->load_model('CollectorModel');
        if (count($_POST) > 0) {
            $data = $collector->innerJoin(array("reg_users"), array("reg_users.User_ID  = collector_details.User_ID"), $_POST);
            if ($data) {
                echo json_encode(['success' => $data]);
            } else {
                echo json_encode(['error' => 'Data not found']);
            }
        }
    }

    function BatchProgress()
    {
        $id = 0;
        $model = $this->load_model('Batch');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "ID parameter is not set in the URL.";
        }
        $data = $model->first("Batch_ID", $id);
        $inventory = $this->load_model('InventoryModel');
        $inventory = $inventory->where("Batch_ID ", $id);
        $data->pagetype = "Batch";
        $data->statusint = statustoint($data->Status);
        $user = $this->load_model('User');
        if ($data->Collector_ID != NULL) {
            $collector = $user->first("User_ID", $data->Collector_ID);
            $data->Collector_Name = $collector->FirstName . " " . $collector->LastName;
        }
        $user = $user->first("User_ID", $data->User_ID);
        $data->User_ID = $user->FirstName . " " . $user->LastName;
        $this->view('Inventory/BatchProgress', [$data, 'rows' => $inventory]);
    }

    function InventoryProgress()
    {

        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "ID parameter is not set in the URL.";
        }
        //getting the info of the inventory
        $inventory = $this->load_model('InventoryModel');
        $data = $inventory->first("Inventory_ID", $id);

        //Getting Collector_ID and the Creator_Id From the Inventory_Table
        $Batch = $this->load_model('Batch');
        $Batch = $Batch->first("Batch_ID", $data->Batch_ID);
        $data->Collector_ID = $Batch->Collector_ID;
        $data->Created_Date = $Batch->Date;
        $data->Description = $Batch->Description;
        $data->Creator_ID = $Batch->User_ID;

        //Getting the names of the collector and the creator
        $user = $this->load_model('User');
        if ($data->Collector_ID != NULL) {
            $collector = $user->first("User_ID", $data->Collector_ID);
            $data->Collector_Name = $collector->FirstName . " " . $collector->LastName;
        }
        $creator = $user->first("User_ID", $data->Creator_ID);
        $data->Creator_Name = $creator->FirstName . " " . $creator->LastName;

        //Getting the pickup_ID from the pickup request table
        $pickup = $this->load_model("PickUpRequestModel");
        $pickup = $pickup->first("Inventory_ID", $id);

        //Getting the name of the customer
        if ($pickup != NULL) {
            $customer = $user->first("User_ID", $pickup->Customer_ID);
            $data->customer_ID = $pickup->Customer_ID;
            $data->customer_Name = $customer->FirstName . " " . $customer->LastName;
        }
        //creating the type of info page
        $data->pagetype = "Inventory";
        $data->statusint = statustoint($data->Status);

        $this->view('Inventory/InventoryProgress', ['data' => $data]);
    }

    function CustomerDetails()
    {

    }

    function employeeDetails()
    {

    }

    function InventoryBreakdown()
    {
        $inventory = $this->load_model('InventoryModel');
        $data = $inventory->query("
        SELECT waste_type, SUM(Weight) AS total_weight
FROM inventory
WHERE waste_type <> 'NEW'
GROUP BY waste_type;
", $data = []);
        $this->view('Charts/InventoryBreakdown', [$data]);
    }

    function UpdateStatus()
    {
        var_dump($_POST);
        if (count($_POST) > 0) {
            $arr1['Status'] = 'Finished';
            $arr2['Status'] = 'In_Warehouse';
            $Job = $this->load_model('PickupJobs');
            $pickupRequest = $this->load_model('PickUpRequestModel');
            $inventory = $this->load_model('InventoryModel');
            $InventoryIds = explode(",", $_POST["jobs"]);
            foreach ($InventoryIds as $Inventory_ID) {
                $pickupRequest->update($Inventory_ID, $arr1, "Inventory_ID");
                $data = $pickupRequest->query("SELECT Job_ID FROM pickup_request WHERE Inventory_ID = '" . $Inventory_ID . "'")[0];
                $temp = $pickupRequest->query("SELECT Job_ID FROM pickup_request WHERE Job_ID = '" . $data->Job_ID . "' AND Status <> 'Finished'");
                if ($temp == null) {
                    $Job->query("UPDATE pickup_jobs SET Status = 'Finished' WHERE Job_ID = '" . $data->Job_ID . "'");;
                }
                $data = $inventory->update($Inventory_ID, $arr2, "Inventory_ID");
            }
            message("Job Status Updated Successfully!");
            if($_POST['NewBatch'] == 'true'){
                $this->inventoryGeneration();
            }
            $this->redirect("/GeneralManager");
        }
    }

    function inventoryGeneration(){
        if (count($_POST) > 0) {
            $batch = $this->load_model('Batch');
            $inventory = $this->load_model('InventoryModel');
            if ($batch->validate($_POST)) {
                $data = $batch->insert($_POST);
                for ($i = 0; $i < $_POST['Size']; $i++) {
                    $inventory->insert($data);
                }
                message(['Batch Created Successfully!', 'success']);
                $this->redirect('Inventory/BatchProgress/?id='.$data['Batch_ID']);
                return;
            } else {
                $errors = $batch->errors;
            }
        }
    }

    function PendingInventory()
    {
        $inventory = $this->load_model('InventoryModel');
        $data = $inventory->query("SELECT * FROM pickup_request WHERE Collector_ID='" . $_POST['Collector_ID'] . "' AND Status='Collected'");
        echo (json_encode($data));
        return;
    }
}

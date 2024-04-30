<?php
class Machine extends Controller
{

    function index()
    {
        $result = "";
        $message = json_decode($_POST['message'], true);
        if ($message['Action'] == "UpdateInventory") {
            $result = $this->UpdateInventory($message);
        } elseif ($message['Action'] == "CreateInventories") {
            $result = $this->CreateInventories($message);
        } elseif ($message['Action'] == "UpdateInventoryStatus") {
            $result = $this->UpdateInventoryStatus($message);
        } elseif ($message['Action'] == "UpdateSortingJobStatus") {
            $result = $this->UpdateSortingJobStatus($message);
        } elseif ($message['Action'] == "SortingJobInventoryUpdate") {
            $result = $this->SortingJobInventoryUpdate($message);
        } elseif ($message['Action'] == "GetHistory") {
            $result = $this->GetHistory($message);
        }
        echo $result; //Return empty to keep the connection
    }

    function UpdateInventory($data)
    {
        $SortedInventoryModel = $this->load_model('SortedInventory');
        foreach ($data['Inventory_IDs'] as $inventory) {
            $temp = $SortedInventoryModel->first('Inventory_ID', $inventory[0]);
            $Sorting_Job_IDs = $temp->Sorting_Job_ID . ',' . $data['Sorting_Job_ID'];
            $SortedInventoryModel->update($inventory[0], ['Sorting_Job_ID' => $Sorting_Job_IDs], 'Inventory_ID');
        }
        return "Inventory Updated Successfully";
    }

    function CreateInventories($data)
    {
        $Inventory_IDs = array();
        $InventoryModel = $this->load_model('SortedInventory');
        foreach ($data['Types'] as $Type) {
            $temp = array();
            $temp['Type'] = $Type;
            $temp['Sorting_Job_ID'] = $data['Sorting_Job_ID'];
            $Inventory = $InventoryModel->insert($temp);
            $Inventory_IDs[] = array($Inventory['Inventory_ID'], $Type);
        }
        $payload = array(
            'Action' => 'InventoriesCreated',
            'Inventory_IDs' => $Inventory_IDs,
            'Sorting_Job_ID' => $data['Sorting_Job_ID'],
        );
        $mqttController = new MqttController();
        $mqttController->publish('Recycohub', json_encode($payload));
        $mqttController->disconnect();
        return "Inventories Created Successfully";
    }

    function UpdateInventoryStatus($data)
    {
        $InventoryModel = $this->load_model($data['Model']);
        if($data['Model'] == 'SortedInventory')
        {
            $data['Weight'] = 50;
        }
        $InventoryModel->update($data['Inventory_ID'], ['Status' => $data['Status']], 'Inventory_ID');
        return "UpdateInventoryStatus";
    }

    function UpdateSortingJobStatus($data)
    {
        $SortingJobModel = $this->load_model('SortingJobModel');
        $SortingJobModel->update($data['Sorting_Job_ID'], ['Status' => $data['Status']], 'Sorting_Job_ID');
        $MachineModel = $this->load_model('MachineModel');
        $MachineModel->update($data['Machine_ID'], ['Is_Sorting' => 0], 'Machine_ID');
        return "UpdateSortingJobStatus";
    }

    function SortingJobInventoryUpdate($data)
    {
        $prices = $this->load_model('InventoryTypes');
        $customer = $this->load_model("CustomerModel");
        
        //getting the id of the customer
        $User_ID = $this->load_model("PickUpRequestModel");
        $User_ID = ($User_ID->where("Inventory_ID", $data['Inventory_ID']))[0]->Customer_ID;

        $types = $data['Weight'];
        $inClause = implode(',', array_map(function ($value) {
            return "'" . $value . "'";
        }, array_column($types, 0)));
        // Use the constructed IN clause in the SQL query
        $query = "SELECT Type_Name, Buying_Price AS Price FROM inventory_types WHERE Type_Name IN ($inClause)";
        $prices = $prices->query($query);
        $sum = 0;
        $Credit_History = array(
            'Inventory_ID' => $data['Inventory_ID'],
            'Date' => date('Y-m-d H:i:s'),
            'Items' => array()
        );
        $i = 0;
        $totalWeight = 0;
        foreach ($prices as $price) {
            $Credit_History["Items"][$price->Type_Name] = array(
                "Weight" => $types[$i][1],
                "Price" => $price->Price
            );
            $totalWeight += floatval($types[$i][1]);
            $sum = $sum + floatval($types[$i][1]) * floatval($price->Price);
            $i = $i + 1;
        }
        $Credit_History = json_encode($Credit_History, true);
        //return(var_dump($User_ID,$_POST, $sum, $data));
        $query = "UPDATE customer SET Credit_History = '$Credit_History',Credits = '$sum' WHERE Customer_ID = '$User_ID';";
        $customer = $customer->query($query);
        //var_dump($query, $User_ID);
        $temp = array();
        $temp['Weight_After_Sorting'] = $totalWeight;
        $temp['Status'] = 'Sorted';
        $inventory = $this->load_model("InventoryModel");
        $data = $inventory->update($data["Inventory_ID"], $temp, "Inventory_ID");
        return("Successfully updated");
    }

    function GetHistory1($data){
        $temp = array();
        $temp['Machine_ID'] = $data;
        $this->GetHistory($temp);
    }

    function GetHistory($data){
        $SortingJob = $this->load_model('SortingJobModel');
        $SortingJob = $SortingJob->query("SELECT * FROM sorting_job WHERE Machine_ID ='" . $data['Machine_ID'] . "' AND Status = 'In_Progress'")[0];
        $SortedInventory = $this->load_model('SortedInventory');
        $SortedInventory = $SortedInventory->where('Sorting_Job_ID', $SortingJob->Sorting_Job_ID);
        $Inventory = $this->load_model('InventoryModel');
        $Inventory = $Inventory->where('Sorting_Job_ID', $SortingJob->Sorting_Job_ID);
        $Inventory_IDs = array();
        foreach($Inventory as $inv){
            $Inventory_IDs[] = $inv->Inventory_ID;
        }
        $SortingTo = array();
        foreach($SortedInventory as $inv){
            $SortingTo[] = $inv->Inventory_ID;
        }
        $payload = array(
            'Action' => 'UpdateHistory',
            'Inventory_IDs' => $Inventory_IDs,
            'Sorting_Job_ID' => $SortingJob->Sorting_Job_ID,
            'SortingTo'=> $SortingTo
        );
        $mqttController = new MqttController();
        $mqttController->publish('Recycohub', json_encode($payload));
        $mqttController->disconnect();
    }
}
?>
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
            $Inventory_IDs[] = array($Inventory['Inventory_ID'],$Type);
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
}
?>
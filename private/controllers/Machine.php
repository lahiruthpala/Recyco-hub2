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

    function SortingJobUpdate()
	{
		$inventory = $this->load_model("InventoryModel");
		$prices = $this->load_model('InventoryTypes');
		$items = json_decode($_POST['Weight_After_Sorting'], true);

		// Extract the Type_Name values from $items
		$typeNames = array_keys($items);

		// Construct the IN clause for the SQL query
		$inClause = implode(',', array_map(function ($typeName) {
			return "'" . $typeName . "'";
		}, $typeNames));
		// Use the constructed IN clause in the SQL query
		$query = "SELECT Type_Name, Buying_Price AS Price FROM prices WHERE Type_Name IN ($inClause)";
		$prices = $prices->query($query);
		//var_dump($query, $inClause, $prices);
		$sum = 0;
		$data = array(
			'Inventory_ID' => $_POST['Inventory_ID'],
			'Date' => date('Y-m-d H:i:s'),
			'Items' => array()
		);
		foreach ($prices as &$price) {
			$data["Items"][substr($price->Type_Name, 0, -2)] = array(
				"Weight" => $items[$price->Type_Name],
				"Price" => $price->Price
			);
			$sum = $items[$price->Type_Name] * $price->Price;
		}
		$data = json_encode($data, true);
		//var_dump($_POST, $sum, $data);
		$customer = $this->load_model("CustomerModel");
		$User_ID = $this->load_model("PickUpRequestModel");
		$User_ID = ($User_ID->where("InventoryId", $_POST['Inventory_ID']))[0]->Customer_ID;
		$query = "UPDATE customer SET Credit_History = '$data' WHERE User_ID = '$User_ID';";
		$customer = $customer->query($query);
		//var_dump($query, $User_ID);
		$data = $inventory->update($_POST["Inventory_ID"], $_POST, "Inventory_ID");
	}
}
?>
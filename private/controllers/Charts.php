<?php
class Charts extends Controller
{
    function index()
    {
    }

    function WarehouseCapacity()
    {
        $generalmanager = $this->load_model('GeneralmanagerModel');
        $data = array();
        //$data['User_ID'] = Auth::getUser_ID();
        //$data = $generalmanager->innerJoin(array("reg_users"), array("reg_users.User_ID  = generalmanager.User_ID"), $data);
        $sortingcenter = $this->load_model('SortingCenter');
        $data = $sortingcenter->where("SortingCenter_ID", 'SC001');
        $invantory = $this->load_model("InventoryModel");
        $totalWeight = $invantory->query("SELECT SUM(Weight) as TotalWeight FROM inventory WHERE status IN ('In_Warehouse', 'Sorted', 'Sorting'); ");
        $data[0]->TotalWeight = $totalWeight[0]->TotalWeight;
        $this->view('Charts/WarehouseCapacity', $data);
    }

    function SortingRate()
    {
        $data = array();
        $Sorting_job_model = $this->load_model("SortingJobModel");
        $data = $Sorting_job_model->query("Select DATE(Start_Date) AS Date, SUM(J.Weight) AS count FROM sorting_job S JOIN (SELECT * FROM inventory GROUP BY Sorting_Job_ID) J ON S.Sorting_Job_ID=J.Sorting_Job_ID WHERE S.Status='Completed' GROUP BY DATE(Start_Date);");
        if($data == null){
            $data = [];
        }
        $this->view("Charts/SortingRate", $data);
    }

    function WarehouseInsOuts()
    {
        $invantory = $this->load_model("InventoryModel");
        $data = $invantory->query("Select * From inventory_history");
        $this->view("Charts/WarehouseInsOuts", ['data' => $data]);
    }

    function SortedItems()
    {
        $items = $this->load_model("SortedInventory");
        $data = $items->query("SELECT Type, SUM(Weight) AS total_weight FROM sorted_inventory WHERE Type <> 'Sold' AND Type <> 'Sorting' GROUP BY Type;", $data = []);
        $this->view('Charts/SortedItems', [$data]);
    }
    function SortingEfficiency(){
        $sortingcenter = $this->load_model('SortingCenter');
        $data = $sortingcenter->where("SortingCenter_ID", 'SC001');
        $invantory = $this->load_model("InventoryModel");
        $totalWeight = $invantory->query("SELECT SUM(Weight) as TotalWeight FROM inventory WHERE status IN ('In_Warehouse', 'Sorted'); ");
        $data[0]->TotalWeight = $totalWeight[0]->TotalWeight;
        $this->view("Charts/SortingEfficiency", $data);
    }

    function CollectionRate(){
        $pickupRequest = $this->load_model('PickUpRequestModel');
        $data = $pickupRequest->query("SELECT COUNT(*) as TotalCollections, DATE(Completed_Date) AS Date, Status FROM pickup_request WHERE Status='Finished' OR Status='Rejected' GROUP BY DATE(Completed_Date), Status;");
        $this->view("Charts/CollectionRate", ['data' => $data]);
    }

    function CollectionHeartMap(){
        $pickupRequest = $this->load_model('PickUpRequestModel');
        $data = $pickupRequest->query("SELECT Latitude, Longitude FROM pickup_request WHERE Status='Finished' OR Status='Rejected';");
        $this->view("Charts/CollectionHeartMap", ['data' => $data]);
    }
}
?>

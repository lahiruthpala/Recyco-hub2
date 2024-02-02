<?php
    class Charts extends Controller{
        function index(){}

        function WarehouseCapacity(){
            $generalmanager = $this->load_model('GeneralmanagerModel');
            $data = array();
            $data['User_ID'] = Auth::getUser_ID();
            $data = $generalmanager->innerJoin(array("reg_users"), array("reg_users.User_ID  = generalmanager.User_ID"), $data);
            $sortingcenter = $this->load_model('SortingCenter');
            $data = $sortingcenter->where("SortingCenter_ID", $data[0]->SortingCenter_ID);
            $invantory = $this->load_model("InventoryModel");
            $totalWeight = $invantory->query("SELECT SUM(Weight) as TotalWeight FROM inventory WHERE status IN ('In whorehouse', 'Sorted'); ");
            $data[0] -> TotalWeight = $totalWeight[0] -> TotalWeight;
            $this->view('Charts/WarehouseCapacity', $data);
        }

        function SortingRate(){
            $data = array();
            $Sorting_job_model = $this->load_model("SortingJobModel");
            $data = $Sorting_job_model->query("SELECT DATE(Start_Date) as Date, COUNT(*) AS count FROM sorting_job WHERE Status = 'Sorted' GROUP BY DATE(Start_Date)");
            $this->view("Charts/SortingRate" ,$data);
        }
    }
?>
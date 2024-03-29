<?php
    class Automation extends Controller{
        function index(){}

        function CreateCollectingJobs(){
            $pickup = $this->load_model("PickUpRequestModel");
            $data = $pickup->where("Status", "Pending");
            $collector = $this->load_model("CollectorModel");
            $collector = $collector->where("Status", "Available");
            $collector = $collector->where("SortingCenter_ID", $data[0]->SortingCenter_ID);
            $collector = $collector->where("Area", $data[0]->Area);
            $collector = $collector->where("Type", $data[0]->Type);
            $collector = $collector->where("Capacity", ">=", $data[0]->Weight);
            $collector = $collector->where("Date", date("Y-m-d"));
            if($collector){
                $collector = $collector[0];
                $pickup->Collector_ID = $collector->Collector_ID;
                $pickup->Status = "Assigned";
                $pickup->update($data[0]->Job_ID);
                $collector->Status = "Busy";
                $collector->update($collector->Collector_ID);
                $this->view('Automation/CollectingJobs', $data);
            }else{
                $this->view('Automation/CollectingJobs', []);
            }
        }
    }
?>
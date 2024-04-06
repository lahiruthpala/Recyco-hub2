<?php
class Automation extends Controller
{
    function index()
    {
    }

    function CreateCollectingJobs()
    {
        if ($_POST['pwd'] == "123456789") {
            $pickup = $this->load_model("PickUpRequestModel");
            $data = $pickup->where("Status", "Pending");
            if ($data != null) {
                $groupedData = array();
                foreach ($data as $request){
                    $sectorId = $request->sector_ID;
                    $weight = $request->weight;
                    if (!isset($groupedData[$sectorId])) {
                        $groupedData[$sectorId] = array(
                            'total_weight' => 0,
                            'requests' => array()
                        );
                    }

                    $groupedData[$sectorId]['total_weight'] += $weight;
                    $groupedData[$sectorId]['requests'][] = $request->Pickup_ID;
                }

                $collector = $this->load_model("CollectorModel");
                $collector = $collector->where("Status", "Active");
                $sectorCollectorMap = array();
                foreach ($collector as $collectorData) {
                    $sectorId = $collectorData->sector_ID;
                    $collectorId = $collectorData->Collector_ID;

                    if (!isset($sectorCollectorMap[$sectorId])) {
                        $sectorCollectorMap[$sectorId] = array();
                    }

                    $sectorCollectorMap[$sectorId][] = $collectorId;
                }
                foreach ($groupedData as $sectorId => $group) {
                    if (isset($sectorCollectorMap[$sectorId])) {
                        $collectors = $sectorCollectorMap[$sectorId];
                        $job = $this->load_model("PickupJobs");
                        $jobdata = $job->insert(array("Collector_ID" => $collectors[0]));
                        $temp = array();
                        $temp["Status"] = "Assigned";
                        $temp["Collector_ID"] = $collectors[0];
                        $temp["Job_ID"] = $jobdata['Job_ID'];
                        $pickup->update($group['requests'][0], $temp, "Pickup_ID");
                    }
                }
                echo "Done";
            } else {


            }
        }
    }
}
?>
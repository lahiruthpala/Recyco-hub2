<?php
require "../private/controllers/mail.php";
class Automation extends Controller
{
    function index()
    {
    }

    function CreateCollectingJobs()
    {
        $pickup = $this->load_model("PickUpRequestModel");
        $data = $pickup->query("SELECT * FROM pickup_request WHERE Status='Pending' AND Collection_Date='" . date("Y-m-d", strtotime("+1 day")) . "'");
        var_dump($data);
        if ($data != null) {
            $groupedData = array();
            foreach ($data as $request) {
                $sectorId = $request->sector_ID;
                $Weight = $request->Weight;
                if (!isset($groupedData[$sectorId])) {
                    $groupedData[$sectorId] = array(
                        'total_weight' => 0,
                        'requests' => array()
                    );
                }
                $groupedData[$sectorId]['total_weight'] += $Weight;
                $groupedData[$sectorId]['requests'][] = array(
                    'Customer_ID' => $request->Customer_ID,
                    'Pickup_ID' => $request->Pickup_ID,
                    'Weight' => $Weight
                );
            }
            print_r($groupedData);
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
            var_dump($sectorCollectorMap);
            foreach ($groupedData as $sectorId => $group) {
                if (isset($sectorCollectorMap[$sectorId])) {
                    if ($group['total_weight'] < 350) {
                        $collectors = $sectorCollectorMap[$sectorId];
                        $job = $this->load_model("PickupJobs");
                        $jobdata = $job->insert(array("Collector_ID" => $collectors[0]));
                        $temp = array();
                        $temp["Status"] = "Assigned";
                        $temp["Collector_ID"] = $collectors[0];
                        $temp["Job_ID"] = $jobdata['Job_ID'];
                        foreach ($group['requests'] as $request) {
                            $pickup->update($request['Pickup_ID'], $temp, "Pickup_ID");
                        }
                        $recipient = $this->load_model('User')->first('User_ID', $collectors[0])->Email;
                        $subject = "RecycoHUB Pickup Job assign";
                        $message = "You have been assigned a pickup job. Please check your dashboard for more details.";
                        send_mail($recipient, $subject, $message);
                    } elseif ($group['total_weight'] < 1000) {
                        $collectors = $sectorCollectorMap[$sectorId];
                        $job = $this->load_model("PickupJobs");
                        $jobdata = $job->insert(array("Collector_ID" => $collectors[0]));
                        $temp = array();
                        $temp["Status"] = "Assigned";
                        $temp["Collector_ID"] = $collectors[0];
                        $temp["Job_ID"] = $jobdata['Job_ID'];
                        foreach ($group['requests'] as $request) {
                            $pickup->update($request['Pickup_ID'], $temp, "Pickup_ID");
                        }
                        $recipient = $this->load_model('User')->first($collectors[0], 'User_ID')->Email;
                        $subject = "RecycoHUB Pickup Job assign";
                        $message = "You have been assigned a pickup job. Please check your dashboard for more details.";
                        send_mail($recipient, $subject, $message);
                    } elseif ($group['total_weight'] >= 1000) {
                        $i = 0;
                        $maxWeight = 1000;
                        $collectors = $sectorCollectorMap[$sectorId];
                        $job = $this->load_model("PickupJobs");
                        $jobdata = $job->insert(array("Collector_ID" => $collectors[0]));
                        $temp = array();
                        $temp["Status"] = "Assigned";
                        $temp["Collector_ID"] = $collectors[$i];
                        $temp["Job_ID"] = $jobdata['Job_ID'];
                        foreach ($group['requests'] as $request){
                            if (isset($collectors[$i])) {
                                $maxWeight -= $request['Weight'];
                                if ($maxWeight >= 0) {
                                    $pickup->update($request['Pickup_ID'], $temp, "Pickup_ID");
                                }
                                if ($maxWeight <= 0) {
                                    $maxWeight = 1000;
                                    $i += 1;
                                    if (isset($collectors[$i])) {
                                        $recipient = $this->load_model('User')->first($collectors[$i - 1], 'User_ID')->Email;
                                        $subject = "RecycoHUB Pickup Job assign";
                                        $message = "You have been assigned a pickup job. Please check your dashboard for more details.";
                                        send_mail($recipient, $subject, $message);
                                        $jobdata = $job->insert(array("Collector_ID" => $collectors[$i]));
                                        $temp = array();
                                        $temp["Status"] = "Assigned";
                                        $temp["Collector_ID"] = $collectors[$i];
                                        $temp["Job_ID"] = $jobdata['Job_ID'];
                                    }
                                }
                            } else {
                                $recipient = $this->load_model('User')->first($request['Customer_ID'], 'User_ID')->Email;
                                $subject = "RecycoHUB Pickup Request";
                                $message = "Sorry we are unable to assign a collector for your request. Please try again later.";
                                send_mail($recipient, $subject, $message);
                            }
                        }
                    }
                    $pickup->query("CALL RotatePriorities('S001')");
                }
            }
            echo "Done";
        } else {

        }
        if ($_POST['pwd'] == "123456789") {

        }
    }
}
?>
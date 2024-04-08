<?php
class collector extends Controller
{

    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        if (Auth::getRole() == "Collector") {
            return true;
        } else {
            $this->redirect('login');
        }
    }

    function index()
    {
        $this->view('Collector/collector');
    }

    function PendingJobs()
    {
        $pickup = $this->load_model('PickupJobs');
        // Auth::getCollector_ID
        $pickup = $pickup->query("SELECT * FROM pickup_jobs WHERE Collector_ID='" . Auth::getUser_ID() . "'AND Status='Assigned'");
        $this->view('Collector/Jobs/PendingJobs', ['rows' => $pickup]);
    }

    function AcceptedJobs()
    {
        $pickup = $this->load_model('PickupJobs');
        // Auth::getCollector_ID
        $pickup = $pickup->query("SELECT * FROM pickup_jobs WHERE Collector_ID='" . Auth::getUser_ID() . "'AND Status='Accepted'");
        $this->view('Collector/Jobs/AcceptedJobs', ['rows' => $pickup]);
    }

    function AcceptJob($jobid, $id, $status)
    {
        $pickup = $this->load_model('PickUpRequestModel');
        if ($status == 'Accepted') {
            $pickup->update($id, ['Status' => $status], 'Pickup_ID');
        }
        if ($status == 'Rejected') {
            $pickup->update($id, ['Status' => $status], 'Pickup_ID');
        }
        $temp = $pickup->query("SELECT * FROM pickup_request WHERE Job_ID = '" . $jobid . "' AND Status = 'Assigned'");
        if ($temp == null) {
            $pickupjob = $this->load_model('PickupJobs');
            $pickup = $pickupjob->query("UPDATE pickup_jobs SET Status = 'Accepted' WHERE Job_ID = '" . $jobid . "'");
            $this->redirect('collector');
        }
        $this->redirect('collector/details/' . $jobid . '/Assigned');
    }

    function FinishedJobs()
    {
        $pickup = $this->load_model('PickupJobs');
        // Auth::getCollector_ID
        $pickup = $pickup->query("SELECT * FROM pickup_jobs WHERE Collector_ID='" . Auth::getUser_ID() . "' AND (Status='Completed' OR Status='Finished')");
        $this->view('Collector/Jobs/FinishedJobs', ['rows' => $pickup]);
    }

    function table()
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->findAll();
        $this->view('pickup_table', ['rows' => $data]);
    }

    function details($id, $Status)
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->query("SELECT * FROM pickup_request WHERE Job_ID = '" . $id . "' AND Status = '" . $Status . "'");
        $this->view('Collector/RequestDetails', ['rows' => $data]);
    }

    public function inventory()
    {
        $pickup = $this->load_model('RawInvnetoryModel');
        $pickup = $pickup->where("Collector_ID", "25435");


        $this->view('Collector/inventory', ['rows' => $pickup]);
    }


    function jobs($id, $type, $pid)
    {
        $pickup = $this->load_model('PickUpRequestModel');
        // Get pickup requests with the specified ID
        // Auth::getCollector_ID
        $arr = [];
        $arr['jobstatus'] = $type;
        $data = $pickup->Update($id, $arr, "Inventory_ID");
        $this->details($pid);
    }

    function statusupdate($id, $type)
    {
        $pickup = $this->load_model('PickupJobs');

        $arr = [];
        $arr['Status'] = $type;

        $data = $pickup->Update($id, $arr, "Job_ID");
        $this->index();

    }

    function start($id)
    {
        // For view history in the collector dashboard about inventory
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->where('Pickup_ID', $id);

        $this->view('Collector/inventory', ['rows' => $data]);
    }

    function inven($id, $type, $pid)
    {
        $in = $this->load_model('PickUpRequestModel');

        $arr = [];

        $arr['jobstatus'] = $type;

        $data = $in->Update($id, $arr, "InventoryId");
        $this->start($pid);

    }
    function store($id, $type, $jobid)
    {
        $in = $this->load_model('PickUpRequestModel');
        $inventory = $this->load_model('InventoryModel');

        $arr = [];
        $invenarray = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have the relevant validation and sanitation in place
            $_POST['Status'] = "Collected";
            $_POST['Completed_Date'] = date('Y-m-d H:i:s');
            $data = $inventory->update($_POST['Inventory_ID'], $_POST, "Inventory_ID");
            $data = $in->update($id, $_POST, "Pickup_ID");
            $temp = $in->query("SELECT * FROM pickup_request WHERE Job_ID = '" . $jobid . "' AND Status = 'Accepted'");
            message(['Successfully Updated the pickup request', 'success']);
            if ($temp == null) {
                $pickupjob = $this->load_model('PickupJobs');
                $pickup = $pickupjob->query("UPDATE pickup_jobs SET Status = 'Completed' WHERE Job_ID = '" . $jobid . "'");
                $this->redirect('collector');
                return;
            }
            $this->redirect('collector/details/' . $jobid . '/Accepted');
        }
    }
    function form($id)
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->query("SELECT * FROM pickup_request P JOIN reg_users U ON P.Customer_ID = U.User_ID WHERE P.Pickup_ID ='" . $id . "'");
        $watetype = $this->load_model("WasteType");
        $waste = $watetype->findAll(1, 10, "Waste_ID");
        $this->view('Collector/form', ['data' => $data, 'waste' => $waste]);
    }

    function profile()
    {
        // code...

        $collector = $this->load_model('CollectorModel');
        $user = $this->load_model('User');
        $user = $user->first("User_ID", Auth::getUser_ID());
        // Auth::getCollector_ID
        $data = $collector->first("Collector_ID", Auth::getUser_ID());
        $data->firstname = $user->FirstName;
        $data->lastname = $user->LastName;
        $data->Phone = $user->Phone;
        $data->Email = $user->Email;
        $data->Address = $user->Address;
        $this->view('Collector/profile', ['row' => $data]);

    }
    function profileedit($cId)
    {
        // code...

        $collector = $this->load_model('CollectorModel');

        // Auth::getCollector_ID
        $data = $collector->first("Collector_ID", $cId);
        $this->view('Collector/profile_edit', ['data' => $data]);



    }

    public function updateProfile($id)
    {

        $in = $this->load_model('CollectorModel');

        $arr = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $firstName = $_POST['fname'] ?? '';
            $lastName = $_POST['lname'] ?? '';
            $email = $_POST['email'] ?? '';
            $contactNo = $_POST['contactNo'] ?? '';
            $address = $_POST['address'] ?? '';
            $vehicleNo = $_POST['vehicleNo'] ?? '';

            $arr = [
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $email,
                'contactNo' => $contactNo,
                'address' => $address,
                'vehicleNo' => $vehicleNo


            ];



            $data = $in->Update($id, $arr, "Collector_ID");

            $this->profile();

        }
    }

    function sendReminders()
    {

    }

    function SetPickupJob()
    {
        $pickupRequest = $this->load_model('PickUpRequestModel');
        $collectors = $pickupRequest->query("SELECT DISTINCT Collector_ID FROM pickup_request WHERE Status = 'Pending'");
        $pickup = $this->load_model('PickupJobs');
        if ($collectors != null) {
            foreach ($collectors as $collector) {
                $data = $pickup->insert((array) $collector);
                var_dump($data);
                $data = $pickupRequest->query("UPDATE pickup_request SET Status = 'Assigned', Job_ID ='" . $data['Job_ID'] . "' WHERE Collector_ID = '" . $data['Collector_ID'] . "' && " . " Status = 'Pending'");
                var_dump($data);
                die;
            }
        } else {
            echo "No pending pickups";
        }
    }
}

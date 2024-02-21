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

    function FinishedJobs()
    {
        $pickup = $this->load_model('PickupJobs');
        // Auth::getCollector_ID
        $pickup = $pickup->query("SELECT * FROM pickup_jobs WHERE Collector_ID='" . Auth::getUser_ID() . "'AND Status='Finished'");
        $this->view('Collector/Jobs/FinishedJobs', ['rows' => $pickup]);
    }

    function table()
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->findAll();
        $this->view('pickup_table', ['rows' => $data]);
    }

    function details($id)
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->where('Job_ID', $id);
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
        $data = $pickup->Update($id, $arr, "InventoryId");
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
    function store($id, $type, $pid)
    {
        $in = $this->load_model('PickUpRequestModel');
        $inventory = $this->load_model('InventoryModel');

        $arr = [];
        $invenarray = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming you have the relevant validation and sanitation in place
            $wasteType = $_POST['wasteType'];
            $weight = $_POST['weight'];
            $InventoryId = $_POST['InventoryId'];
            $current_timestamp = time();

            // Update the database using the form values
            $arr = [
                'Status' => $type,
                'waste_type' => $wasteType,
                'weight' => $weight,
                'InventoryId' => $InventoryId,
                'Completed_Date' => date('Y-m-d H:i:s', $current_timestamp),
            ];
            $invenarray = [
                'Status' => 'Collected',
                'Type' => $wasteType,
                'Weight' => $weight,
                ];
            $data = $inventory->update($_POST['InventoryId'], $invenarray, "Inventory_ID");
            $data = $in->update($id, $arr, "Pickup_ID");
            message(['Successfully Updated the pickup request','success']);
            $this->redirect('collector/details/' . $pid);
        }
    }
    function form($id)
    {
        $user = $this->load_model('PickUpRequestModel');
        $data = $user->first('Pickup_ID', $id);
        $this->view('Collector/form', ['data' => $data]);
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
        }else{
            echo "No pending pickups";
        }
    }
}

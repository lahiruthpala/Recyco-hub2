<?php
class GeneralManager extends Controller
{
    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        $allowedRoles = ["SortingManager", "GeneralManager", "Admin"];
        if (in_array(Auth::getRole(), $allowedRoles)) {
            return true;
        } else {
            $this->redirect('login');
        }
    }
    function index()
    {
        // code...
        $this->view('GeneralManager/GeneralManager', [
            'errors' => "",
        ]);
    }

    function Generate()
    {
        $errors = array();
        if (count($_POST) > 0) {
            $batch = $this->load_model('Batch');
            $inventory = $this->load_model('InventoryModel');
            if ($batch->validate($_POST)) {
                $data = $batch->insert($_POST);
                for ($i = 0; $i < $_POST['Size']; $i++) {
                    $inventory->insert($data);
                }
                $this->redirect('GeneralManager');
            } else {
                //errors
                $errors = $batch->errors;
            }
        }
        $events = $this->load_model('AutomatedEvents')->findAll();
        $this->view('GeneralManager/addNewInventory', [
            'errors' => $errors,
            'events' => $events,
        ]);
    }

    function SetGenerations()
    {
        var_dump($_POST);
        $errors = array();
        if (count($_POST) > 0) {
            $jobs = $this->load_model('AutomatedEvents');
            //var_dump($_POST);
            $jobs->insert($_POST);

            // Convert day to a numeric representation (1 for Monday, 2 for Tuesday, etc.)
            $dayOfWeekMap = [
                'Sunday' => 0,
                'Monday' => 1,
                'Tuesday' => 2,
                'Wednesday' => 3,
                'Thursday' => 4,
                'Friday' => 5,
                'Saturday' => 6,
            ];
            $dayOfWeek = $dayOfWeekMap[$_POST['day']];

            // Extract hours and minutes from the time
            list($hours, $minutes) = explode(':', $_POST['Time']);

            // Specify the cron schedule
            $cron_schedule = "$minutes $hours * * $dayOfWeek";

            // Command to be executed (replace this with the path to your PHP script)
            $command = 'php /path/to/your/script.php';

            // Add the cron job
            //exec('(crontab -l ; echo "' . $cron_schedule . ' ' . $command . '") | crontab -');
            $this->redirect("Generalmanager");
        }
    }

    function partnership()
    {
        $this->view('GeneralManager/Partnershipreview');
    }

    function partnershipTable()
    {
        $Partners = $this->load_model('PartnerModel');
        $partners = $Partners->findAll(1, 10, "Partner_ID");
        $this->view('GeneralManager/Partner/PartnerTable', ['rows' => $partners]);
    }

    function partner()
    {
        $remarks = $this->load_model('Remarks');
        if (isset($_POST["Note"]) && $_POST["Note"] != "") {
            $remarks->insert($_POST);
        }
        $partner = $this->load_model('PartnerModel');
        $contact = $this->load_model('PartnerContact');
        $article = $this->load_model('Articles');
        $events = $this->load_model('Event');
        $complaints = $this->load_model('Complaints');
        $partner = $partner->first("Partner_ID", $_GET['id']);
        $remarks = $remarks->where("Partner_ID", $_GET['id']);
        $contact = $contact->where("Partner_ID", $_GET['id']);
        $article = $article->where("Partner_ID", $_GET['id']);
        $events = $events->where("Partner_ID", $_GET['id']);
        $complaints = $complaints->where("Partner_ID", $_GET['id']);
        $this->view('GeneralManager/Partner/Partner', ['partner' => $partner, 'remarks' => $remarks, 'contact' => $contact, 'events' => $events, 'article' => $article, 'complaints' => $complaints]);
    }

    function partnerEvents()
    {
        $events = $this->load_model('Event');
        $events = $events->findAll(1, 10, "Publish_Date");
        $this->view('GeneralManager/Partner/Events', ['rows' => $events]);
    }
    function partnerArticle()
    {
        $article = $this->load_model('Articles');
        $article = $article->findAll(1, 10, "Published_Date");
        $this->view('GeneralManager/Partner/Articles', ['rows' => $article]);
    }

    function TodayArticle()
    {
        $time = time();
        $previous = $time - 24 * 60 * 60;
        $article = $this->load_model('Articles');
        $article = $article->query("SELECT *
        FROM articles
        WHERE Published_Date >= DATE(CURRENT_TIMESTAMP)
          AND Published_Date < DATE(CURRENT_TIMESTAMP + INTERVAL 1 DAY);");
        $this->view('GeneralManager/Partner/Articles', ['rows' => $article]);
    }

    function complaints()
    {
        $complaints = $this->load_model('Complaints');
        $complaints = $complaints->findAll(1, 10, "Date");
        $this->view('GeneralManager/Partner/ComplaintsTable', ['rows' => $complaints]);
    }

    function collector()
    {
        $collectorModel = $this->load_model('CollectorModel');
        $userModel = $this->load_model('User');
        $collectors = $collectorModel->findAll(1, 10, "Collector_ID");
        $data = $userModel->where('Role', 'Collector');
        $collectors[0]->Collector_Name = $data[0]->FirstName . " " . $data[0]->LastName;
        $this->view('GeneralManager/Collector', ['collectors' => $collectors]);
    }

    function NewPartnership()
    {
        $NewPartnership = $this->load_model('PendingPartnership');
        $NewPartnership = $NewPartnership->findAll(1, 10, "Application_Date");
        $this->view('GeneralManager/Partner/NewPartnershipTable', ['rows' => $NewPartnership]);
    }

    function PartnershipReview($id)
    {
        if ($id == null) {
            return;
        }
        $NewPartnership = $this->load_model('PendingPartnership');
        $NewPartnership = $NewPartnership->first("Application_ID", $id);
        $this->view('GeneralManager/Partner/NewPartershipreview', ['rows' => $NewPartnership]);
    }

    function collections()
    {
        $Pickups = $this->load_model('PickUpRequestModel');
        $data = $Pickups->query("SELECT COUNT(*) AS Count, DATE(Completed_Date) AS Date FROM pickup_request WHERE Status != 'Completed' GROUP BY DATE(Completed_Date)");
        $this->view('GeneralManager/Collectors/Collections', ['rows' => $data]);
    }

    function PendingPickups()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Pickups = $this->load_model('PickUpRequestModel');
            $data = $Pickups->query("SELECT * FROM pickup_request WHERE Collector_ID = '" . $_POST['Collector_ID'] . "' AND Status != 'Finished'");
            echo (json_encode($data));
            return;
        }
        $Pickups = $this->load_model('PickupJobs');
        $data = $Pickups->query("SELECT * FROM pickup_jobs P JOIN collector_details C ON C.Collector_ID=p.Collector_ID WHERE p.Status <> 'Finished' ORDER BY p.Collector_ID");
        $this->view('GeneralManager/Collectors/PendingCollections', ['rows' => $data]);
    }

    function CollectorComplaints()
    {
        $Pickups = $this->load_model('PickUpRequestModel');
        $data = $Pickups->query("SELECT * FROM pickup_request WHERE Complaints != 'NULL'");
        $this->view('GeneralManager/Collectors/Complaints', ['rows' => $data]);
    }
}

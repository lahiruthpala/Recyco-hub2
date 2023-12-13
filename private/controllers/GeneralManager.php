<?php
class GeneralManager extends Controller
{
    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        if (Auth::getRole() == "SortingManager") {
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
            $batch = $this->load_model('GenerateInventoryId');
            $inventory = $this->load_model('Inventory');
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
        $errors = array();
        if (count($_POST) > 0) {
            $jobs = $this->load_model('AutomatedEvents');
            var_dump($_POST);
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
            list($hours, $minutes) = explode(':', $_POST['time']);

            // Specify the cron schedule
            $cron_schedule = "$minutes $hours * * $dayOfWeek";

            // Command to be executed (replace this with the path to your PHP script)
            $command = 'php /path/to/your/script.php';

            // Add the cron job
            //exec('(crontab -l ; echo "' . $cron_schedule . ' ' . $command . '") | crontab -');
            
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
        $partner = $this->load_model('PartnerModel');
        $remarks = $this->load_model('Remarks');
        $contact = $this->load_model('PartnerContact');
        $partner = $partner->first("Partner_ID", $_POST['id']);
        $remarks = $remarks->where("Partner_ID", $_POST['id']);
        $contact = $contact->where("Partner_ID", $_POST['id']);
        $this->view('GeneralManager/Partner/Partner', ['partner' => $partner, 'remarks' => $remarks, 'contact' => $contact]);
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
        $article = $article->findAll(1, 10, "Publish_Date");
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
        $events = $this->load_model('Complaints');
        $events = $events->findAll(1, 10, "Publish_Date");
        $this->view('GeneralManager/Partner/complaints', ['rows' => $events]);
    }

    function collector()
    {
        $collectorModel = $this->load_model('CollectorModel');
        $collectors = $collectorModel->findAll(1, 10, "Collector_ID");
        $this->view('GeneralManager/Collector', ['collectors' => $collectors]);
    }

    function NewPartnership()
    {
        $NewPartnership = $this->load_model('PendingPartnership');
        $NewPartnership = $NewPartnership->findAll(1, 10, "Application_Date");
        $this->view('GeneralManager/Partner/NewPartnership', ['rows' => $NewPartnership]);
    }

    function PartnershipReview($id)
    {
        if ($id == null) {
            return;
        }
        $NewPartnership = $this->load_model('PendingPartnership');
        $NewPartnership = $NewPartnership->first("Application_ID", $id);
        $this->view('GeneralManager/Partner/Partershipreview', ['rows' => $NewPartnership]);
    }

    function collections()
    {
        $collectionsModel = $this->load_model('Inventory');
        //$data = $this->where();
    }

    function PendingPickups()
    {
        $pickup = $this->load_model('PickUpRequestModel');
        $data = $pickup->findAll(1, 10, "time");
        $this->view('GeneralManager/Collectors/PendingCollections', ['rows' => $data]);
    }
}

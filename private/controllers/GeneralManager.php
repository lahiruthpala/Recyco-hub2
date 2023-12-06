<?php
class GeneralManager extends Controller
{
    function __construct(){
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
            $inventory = $this->load_model('TableModel');
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
        $this->view('GeneralManager/Partner/Partner', ['partner' => $partner, 'remarks'=>$remarks, 'contact'=>$contact]);
    }

    function partnerEvents()
    {
        $events = $this->load_model('Event');
        $events = $events->findAll(1, 10, "Publish_Date");
        $this->view('GeneralManager/Partner/Events', ['rows' => $events]);
    }
    function partnerArticals()
    {
        $articals = $this->load_model('Articles');
        $articals = $articals->findAll(1, 10, "Publish_Date");
        $this->view('GeneralManager/Partner/Articles', ['rows' => $articals]);
    }

    function complaints()
    {
        $events = $this->load_model('Event');
        $events = $events->findAll(1, 10, "Publish_Date");
        $this->view('GeneralManager/Partner/complaints', ['rows' => $events]);
    }

    function collector(){
        $this->view('GeneralManager/Collector');
    }

    function NewPartnership(){
        $NewPartnership = $this->load_model('PendingPartnership');
        $NewPartnership = $NewPartnership->findAll(1, 10, "Application_Date");
        // echo "dxsdddddddddd";
        // show($NewPartnership);
        // die;
        $this->view('GeneralManager/Partner/NewPartnership', ['rows' => $NewPartnership]);
    }

    function PartnershipReview($id){
        if($id == null){
            return;
        }
        $NewPartnership = $this->load_model('PendingPartnership');
        $NewPartnership = $NewPartnership->first("Application_ID", $id);
        $this->view('GeneralManager/Partner/Partershipreview', ['rows' => $NewPartnership]);
    }
}

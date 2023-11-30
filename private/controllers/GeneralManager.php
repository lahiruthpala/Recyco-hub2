<?php
class GeneralManager extends Controller
{
    function verify()
    {
        if (Auth::getRole() == "sorting manager") {
            return true;
        } else {
            $this->redirect('login');
        }
    }
    function index()
    {
        // code...
        if ($this->verify()) {
            $this->view('GeneralManager/GeneralManager', [
                'errors' => "",
            ]);
        }
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
        $PartnerModel = $this->load_model('PartnerModel');
        $partners = $PartnerModel->findAll(1, 10, "Partner_ID");
        $this->view('GeneralManager/Partnershipreview', ['rows' => $partners]);
    }

    function partnershipTable()
    {
        $PartnerModel = $this->load_model('PartnerModel');
        $partners = $PartnerModel->findAll(1, 10, "Partner_ID");
        $this->view('GeneralManager/Partner/PartnerTable', ['rows' => $partners]);
    }

    function partner()
    {
        $PartnerModel = $this->load_model('PartnerModel');
        $partner = $PartnerModel->first("Partner_ID", $_POST['id']);
        $this->view('GeneralManager/Partner/Partner', ['partner' => $partner]);
    }

    function info()
    {
        $this->view("GeneralManager/Partner/info");
    }
}

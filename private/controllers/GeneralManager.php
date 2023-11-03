<?php
class GeneralManager extends Controller
{
    function index()
    {
        // code...
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        $this->view('GeneralManager', [
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
        $this->view('SortingManager/addNewInventory', [
            'errors' => $errors,
        ]);
    }

    function addNewInventory()
    {
        $this->view("");
    }
}

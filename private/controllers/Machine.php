<?php
class Machine extends Controller
{

    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        if (Auth::getRole() == "Admin") {
            return true;
        } else {
            $this->redirect('login');
        }
    }

    function index()
    {
        $this->view('Admin/AdminHome');
    }

    function showAllMachines(){
        $machine = $this->load_model("MachineModel");
        $data = $machine->findAll(1,10,"Machine_ID");
        $this->view("Admin/SortingCenter/MachineTable", ['rows'=>$data]);
    }
}
?>
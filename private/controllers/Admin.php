<?php
class Admin extends Controller
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

    function AccountManagement(){
        $this->view('Admin/AccountManagement');
    }

    function SortingCenter(){
        $this->view('Admin/SortingCenter');
    }

    function GetAccountinfo(){
        $user = $this->load_model('User');
        $data = $user->query("Select UserName, FirstName, LastName, Role, Status  FROM reg_users where Role != 'Admin'");
        $this->view("Admin/UserAccounts", ['rows' => $data]);
    }

    function AccountCreation(){
        $this->view('Admin/AccountCreation');
    }
}
?>
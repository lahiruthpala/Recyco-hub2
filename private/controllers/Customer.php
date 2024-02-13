<?php
class Customer extends Controller
{
	function index()
	{
        $this->view('Customer/customer');
	}

	function CreatePickups(){
		$this->view("Customer/Setpickup");
	}

	function newrequest(){
		var_dump($_POST['Catogory']);
		var_dump($_GET);
		die;
	}
}

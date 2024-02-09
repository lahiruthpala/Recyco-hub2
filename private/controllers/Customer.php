<?php
class Customer extends Controller
{
	function index()
	{
        $this->view('Customer/customer');
	}

	function CreatePickups(){
		$this->view("/Customer/PickupRequest/Landingpage");
	}
}

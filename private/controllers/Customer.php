<?php
class Customer extends Controller
{
	function index()
	{
        $this->view('Customer/customer');
	}

	function CreatePickups(){
		$pickup = $this->load_model("PickUpRequestModel");
		$data = $pickup->insert($_POST);
	}

}

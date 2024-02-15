<?php
class Customer extends Controller
{
	function index()
	{
		$this->view('Customer/LandingPage');
	}

	function CreatePickups()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$pickup = $this->load_model("PickUpRequestModel");
			$data = $pickup->insert($_POST);
			var_dump($data);
		}
		$this->view("Customer/PickupRequest");
	}

	function newrequest()
	{
		var_dump($_POST['Catogory']);
		var_dump($_GET);
	}
}

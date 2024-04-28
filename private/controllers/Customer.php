<?php
class Customer extends Controller
{
	function index()
	{
		$this->view('Customer/LandingPage');
	}
      
	function CreatePickups()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$pickup = $this->load_model("PickUpRequestModel");
			$data = $pickup->validate($_POST);
			if ($data != false) {
	 			message(["Pickup request successfully placed","success"]);
				$data = $pickup->insert($data);
				$this->redirect('Home');
				return;
			}
		}
		$data = $this->load_model('WasteType')->findAll(1,10,"Waste_ID");
		$this->view("Customer/PickupRequest",['data'=>$data]);
	}

	function newrequest()
	{
		var_dump($_POST['Catogory']);
		var_dump($_GET);
	}

	function info()
	{
		
		$user = $this->load_model('User');
		$data = $user->where('UserName', Auth::getUser_ID());
		$this->view('/Customer/Profile',['user'=>$data]);
	}

	function UpdateUser(){
        $data = $this->load_model("User");
        $data->update(Auth::getUser_ID(),$_POST,"User_ID");

        $this->redirect("/Customer/info");
    }
}

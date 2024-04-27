<?php
class Customer extends Controller
{
	function index()
	{
		
		$testimonial = $this->load_model('Testimonial');
		$testimonials = $testimonial->query("SELECT * FROM testimonial T JOIN reg_users U ON T.User_ID=U.User_ID;");
		$event = $this->load_model('Event');
		$data = $event->findAll(1,3,"Event_ID");
		$this->view('/Home/index',['events'=>$data,'testimonials'=>$testimonials]);
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
}

<?php
class collector extends Controller
{
	function index()
	{
		// code...
		$this->view('Collector');
	}

    function table(){
        $user = $this->load_model('PickUpRequestModel');
		$data = $user->findAll();
        $this->view('pickup table', ['rows'=>$data]);
    }

    function details($id){
        $user = $this->load_model('PickUpRequestModel');
		$data = $user->first('pickupId', $id);
        $this->view('pickup details', ['pickup'=>$data]);
    }
    function confirmation(){
        $this->view('confirmation');
    }
    function declination(){
        $this->view('declination');
    }
}

<?php
class Ecommercesite extends Controller
{
	
	function index()
	{
		// code...
    
        $user = $this->load_model('ProductDetailsModel');
        $data = $user->all();
		
       
        $this->view('Ecommercesite/landing', ['rows' => $data]);
    
		
	}
	

}

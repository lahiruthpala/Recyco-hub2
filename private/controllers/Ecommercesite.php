<?php
class Ecommercesite extends Controller
{
	
	function index()
	{
		// code...
        $user = $this->load_model('ProductDetailsModel');
        $data = $user->findAll("1","10","product_Id");
        $this->view('Ecommercesite/landing', ['rows' => $data]);
		
	}
	

}
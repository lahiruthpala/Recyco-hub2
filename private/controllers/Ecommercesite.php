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

   function details($id)
    {
		$user = $this->load_model('ProductDetailsModel');
       
		$data = $user->where('product_Id',$id);
        $this->view('Ecommercesite/product_details', ['row' => $data]);
    }

	
	
	function productclasses($type)
    {
        $data = $this->load_model('ProductDetailsModel');
       
       
        $products= $data->query("SELECT * FROM products WHERE product_name LIKE '%$type%'");

        $this->view('Ecommercesite/productclasses', ['rows' => $products]);
    }
	
	

}
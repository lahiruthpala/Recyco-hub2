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
   
    
    $metalProducts = array("steel", "bronze", "iron","copper");

    
    $query = "SELECT * FROM products WHERE ";
    if ($type === "metal") {
        $conditions = array();
        foreach ($metalProducts as $metalProduct) {
            $conditions[] = "product_name LIKE '%$metalProduct%'";
        }
        $metalConditions = implode(" OR ", $conditions);
        $query .= "($metalConditions)";
    } else {
        $query .= "product_name LIKE '%$type%'";
    }

   
    $products = $data->query($query);

   
    $this->view('Ecommercesite/productclasses', ['rows' => $products]);
}


}
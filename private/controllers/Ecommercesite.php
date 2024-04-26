<?php
class Ecommercesite extends Controller
{

    function index()
    {
        // code...
        $user = $this->load_model('ProductDetailsModel');
        $data = $user->findAll("1", "10", "product_Id");
        $this->view('Ecommercesite/landing', ['rows' => $data]);

    }

    function details($id)
    {
        $user = $this->load_model('ProductDetailsModel');

        $data = $user->where('product_Id', $id);
        $this->view('Ecommercesite/product_details', ['row' => $data]);
    }



    function productclasses($type)
    {
        $data = $this->load_model('ProductDetailsModel');


        $metalProducts = array("steel", "bronze", "iron", "copper");


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

    function payment()
    {
        $payment = $this->load_model('PaymentModel');
        $data = array();
        $data['merchantID'] = "1212121"; // Replace your Merchant ID
        $data['order_id'] = "123456"; // Replace with your transaction id or unique order id
        $data['items'] = "Payment for Task"; // Item name or Order
        $data['currency'] = "LKR"; // Currency
        $data['amount'] = "1000"; // Amount
        $data['first_name'] = "John"; // First Name
        $data['last_name'] = "Doe"; // Last Name
        $data['email'] = "john.doe@example.com"; // Email
        $data['phone'] = "0771234567"; // Phone Number
        $data['taskVal'] = "1000"; // Task Value
        $data['address'] = "hello";
        $data['commission'] = "100";
        $data['country'] = 'Srilanka';
        $data['hash'] = "dvsdcsdcsdc";
        $this->view('Ecommercesite/Payment', ['data' => $data]);
    }
}
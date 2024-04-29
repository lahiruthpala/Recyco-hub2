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
    function orderform($id)
    {
        $user = $this->load_model('ProductDetailsModel');

        $data = $user->where('product_Id', $id);
        $this->view('Ecommercesite/order', ['row' => $data]);
    }
    function order($id)
    {

        $productorders = $this->load_model('Order');


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $productName = $_POST['product-name'] ?? '';

            $quantity = $_POST['quantity'] ?? 0;


            $data = [

                'product_Id' => $id,
                'product_name' => $productName,

                'quantity' => $quantity,

            ];
            $result = $productorders->insert($data);
            message(['Sucessfully placed the order', 'success']);
            $this->redirect('Ecommercesite');



        }
    }


    function quantitycheck($id)
    {
        $user = $this->load_model('ProductDetailsModel');

        $data = $user->where('product_Id', $id);
        $_POST['amount'] = $_POST['quantity'] * $data[0]->price;
        $_POST['Price'] = $data[0]->price;
        $product = $data[0];

        if ($_POST['quantity'] <= $product->available_amount) {
            message(['Payment Proceed', 'success']);
            $this->payment();
        } else {

            message(['Payment cannot be Proceed Insufficient stock place a order', 'success']);
            $this->view('Ecommercesite/order', ['row' => $data]);


        }

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
        //$payment = $this->load_model('PaymentModel');
        $order = $this->load_model('Order');
        $_POST['User_ID'] = Auth::getUser_ID();
        $order = $order->insert($_POST);
        $data = array();
        $data['merchantID'] = "1226569"; // Replace your Merchant ID
        $data['order_id'] = $order['order_Id']; // Replace with your transaction id or unique order id
        $data['items'] = array(
            (object) array(
                'product_name' => $_POST['product_name'],
                'Price' => $_POST['Price'],
                'quantity' => $_POST['quantity']
            )
        );
        $data['currency'] = "LKR"; // Currency
        $data['amount'] = $_POST['amount']; // Amount
        $data['country'] = 'Srilanka';
        $data['hash'] = strtoupper(md5("1226569" . $data['order_id'] . number_format($data['amount'], 2, '.', '') . $data['currency'] . strtoupper(md5(PAYHERE))));
        $this->view('Ecommercesite/Payment', ['data' => $data]);
    }
}
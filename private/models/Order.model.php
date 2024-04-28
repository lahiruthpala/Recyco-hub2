<?php

class Order extends Model
{
    protected $beforeInsert = [
        'GenerateOrder_ID',
    ];
    protected $table = "orders";

    protected $allowedColumns = [
        'order_Id',
        'product_name',
        'quantity',
        'product_Id',
        'User_ID',
        'Status',
        'amount',
    ];

    function GenerateOrder_ID($data){
        $data['order_Id'] = generateID("order");
        return $data;
    }

}
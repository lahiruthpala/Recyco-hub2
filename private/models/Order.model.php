<?php

class Order extends Model
{
    protected $beforeInsert = [
        'GenerateOrder_ID',
    ];
    protected $table = "orders";

    

    function GenerateOrder_ID($data){
        $data['order_Id'] = generateID("order");
        return $data;
    }

}
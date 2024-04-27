<?php

class CustomerModel extends Model{
    protected $table = "customer";

    protected $allowedColumns = [
        'Customer_ID',
        'Credits',
        'Credit_History',
        'User_ID',
    ];

}
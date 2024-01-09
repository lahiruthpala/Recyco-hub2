<?php

/**
 * User Model
 */
class PartnerModel extends Model
{
    protected $beforeInsert = [
        'Make_PartnerID',
        'Add_User_ID',

    ];

    protected $allowedColumns = [
        'Partner_ID',
        'Company_Name',
        'Events',
        'Articles',
        'Status',
        'User_ID',
    ];

    protected $table = "partner";

    // public function validate($DATA){
    //     // print_r($DATA);
    //     $this->errors = array();
    //     if(empty($DATA['Description'])){
    //         $this->errors[] = 'Add the Discription';
    //     }
    //     if(empty($DATA['Size'])){
    //         $this->errors[] = 'Cant add 0 inventories';
    //     }
    //     if(count($this->errors) == 0){
    //         return true;
    //     }
    //     return false;
    // }
    public function Make_PartnerID($data){
        $data['Partner_ID'] = random_string(6);
        return $data;
    }
    
    public function Add_User_ID($data){
        return $data;
    }
}
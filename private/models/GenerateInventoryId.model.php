<?php

/**
 * User Model
 */
class GenerateInventoryId extends Model
{
    protected $beforeInsert = [
        'Make_BatchID',
        'Add_User_ID'
    ];

    protected $allowedColumns = [
        'Batch_ID',
        'Description',
        'User_ID',
    ];

    protected $table = "inventory_batch";

    public function validate($DATA){
        // print_r($DATA);
        $this->errors = array();
        if(empty($DATA['Description'])){
            $this->errors[] = 'Add the Discription';
        }
        if(empty($DATA['Size'])){
            $this->errors[] = 'Cant add 0 inventories';
        }
        if(count($this->errors) == 0){
            return true;
        }
        return false;
    }
    public function Make_BatchID($data){
        $data['Batch_ID'] = random_string(6);
        return $data;
    }
    
    public function Add_User_ID($data){
        $data['User_ID'] = Auth::getUser_ID();
        return $data;
    }
}
<?php

/**
 * User Model
 */
class User extends Model
{
    protected $primarykey = "=:UserID" ;
    protected $beforeInsert = [
        'make_UserID',
    ];

    protected $allowedColumns = [
        'User_ID',
        'UserName',
        'FirstName',
        'LastName',
        'Email',
        'pwd',
        'Address',
        'Role',
    ];

	protected $table = "reg_users";

    public function validate($DATA){
        // print_r($DATA);
        $this->errors = array();
        if($DATA['pwd1'] != $DATA['pwd2']){
            $this->errors[] = 'Passwords do not match';
        }
        if(strlen($DATA['pwd1']) < 6){
            $this->errors[] = 'Password must be at least 6 characters';
        }
        if($this->where('Email',$DATA['Email'])){
            $this->errors[] = 'Email already exists';
        }
        if(count($this->errors) == 0){
            return true;
        }
        return false;
    }

    public function make_UserID($data){
        do{
            $data['User_ID'] = generateID($data['Role']);
        }while(($this->where('User_ID',$data['User_ID'])));
        return $data;
    }
}
<?php

/**
 * User Model
 */
class User extends Model
{
    protected $primarykey = "=:UserID";
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
        'Status',
    ];

    protected $table = "reg_users";

    public function validate($DATA)
    {
        // print_r($DATA);
        $this->errors = array();
        if ($DATA['pwd1'] != $DATA['pwd2']) {
            $this->errors[] = 'Passwords do not match';
        }
        if (strlen($DATA['pwd1']) < 6) {
            $this->errors[] = 'Password must be at least 6 characters';
        }
        if ($this->where('Email', $DATA['Email'])) {
            $this->errors[] = 'Email already exists';
        }
        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }

    public function make_UserID($data)
    {
        $temp = '';
        if ($data['Role'] == 'Customer') {
            $temp = 'C';
        } elseif ($data['Role'] == 'Collector') {
            $temp = 'Col';
        } elseif ($data['Role'] == 'Admin') {
            $temp = 'Adm';
        } elseif ($data['Role'] == 'Partner') {
            $temp = 'P';
        } elseif ($data['Role'] == 'SortingManager') {
            $temp = 'SM';
        } elseif ($data['Role'] == 'GeneralManager') {
            $temp = 'GM';
        } else {
            $temp = 'U';
        }
        do {
            $data['User_ID'] = generateID($temp);
        } while (($this->where('User_ID', $data['User_ID'])));
        return $data;
    }
}
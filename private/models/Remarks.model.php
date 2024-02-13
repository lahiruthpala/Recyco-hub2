<?php

/**
 * User Model
 */
class Remarks extends Model
{
    protected $beforeInsert = [
        'GenerateRemarkID',
        'GetUser_ID',
    ];
    protected $allowedColumns = [
        'ID',
        'Partner_ID',
        'Note',
        'Date',
        'User_ID'
    ];

    protected $table = "remarks";
    function GenerateRemarkID($data){
        $data['ID'] = generateID("Remark".$data['Partner_ID']);
        return $data;
    }

    function GetUser_ID($data){
        $data['User_ID'] = Auth::getUser_ID();
        return $data;
    }
}
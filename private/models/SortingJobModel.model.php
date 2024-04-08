<?php

/**
 * User Model
 */
class SortingJobModel extends Model
{
    protected $beforeInsert = [
        'Make_Sorting_Job_ID',
        'Add_User_ID'
    ];

    protected $allowedColumns = [
        'Sorting_Job_ID',
        'Status',
        'Machine_ID',
        "Description",
        'Start_Date',
        'End_Date',
        'User_ID',
    ];
    protected $table = "sorting_job";

    public function Make_Sorting_Job_ID($data){
        $data['Sorting_Job_ID'] = generateID("Sort");;
        return $data;
    }

    public function Add_User_ID($data){
        $data['User_ID'] = Auth::getUser_ID();
        return $data;
    }
}
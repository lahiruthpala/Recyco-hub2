<?php
class Articles extends Model
{
    protected $beforeInsert = [
        'Make_Articles_ID',
        'Add_Partner_ID'
    ];

    protected $allowedColumns = [
        'Article_ID',
        'Article_Title',
        'Description',
        'Published_Date',
        'Edit_Date',
        'Data',
        'Partner_ID',
        'Status'
    ];
    protected $table = "articles";

    public function Make_Articles_ID($data){
        $data['Article_ID'] = random_string(6);
        return $data;
    }

    public function Add_Partner_ID($data){
        $data['Partner_ID'] = Auth::getUser_ID();
        return $data;
    }
}
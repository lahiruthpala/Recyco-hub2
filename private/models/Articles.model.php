<?php
class Articles extends Model
{
    protected $beforeInsert = [
        'Make_Articles_ID',
        'Add_Partner_ID'
    ];

    protected $allowedColumns = [
        'Article_ID',
        'Artical_Title',
        'Discription',
        'Data',
        'Partner_ID'
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
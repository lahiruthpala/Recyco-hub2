<?php
class Testimonial extends Model
{
    protected $beforeInsert = [
        'Make_Testimonials_ID',
        'Add_User_ID'
    ];

    protected $allowedColumns = [
        'Testimonials_ID',
        'Stars',
        'Data',
        "User_ID",
    ];

    protected $table = "testimonial";

    public function Make_Testimonials_ID($data){
        $data['Testimonials_ID'] = generateID("Tes");
        return $data;
    }
    
    public function Add_User_ID($data){
        $data['User_ID'] = Auth::getUser_ID();
        return $data;
    }
}
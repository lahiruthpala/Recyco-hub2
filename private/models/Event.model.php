<?php
class Event extends Model
{
    protected $beforeInsert = [
        'Make_Event_ID',
        'Add_Partner_ID'
    ];

    protected $allowedColumns = [
        'Event_ID',
        'Event_Title',
        'Description',
        'Data',
        'Partner_ID',
        'Publish_Date',
        'Event_Starting_Data',
        'Event_location',
        'Event_Mode',
        'Status',
        'Event_Finish_Data',
    ];
    protected $table = "events";

    public function Make_Event_ID($data){
        $data['Event_ID'] = random_string(6);
        return $data;
    }

    public function Add_Partner_ID($data){
        $data['Partner_ID'] = Auth::getUser_ID();
        return $data;
    }
}
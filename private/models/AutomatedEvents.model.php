<?php
class AutomatedEvents extends Model
{
    protected $beforeInsert = [
        'Make_Events_ID',
    ];

    protected $allowedColumns = [
        'ID',
        'Title',
        'Time',
        'Repetition',
        'Size',
        'Status'
    ];
    protected $table = "automated_inventory_generation";

    public function Make_Events_ID($data){
        $data['ID'] = generateID("Gen");
        return $data;
    }
}
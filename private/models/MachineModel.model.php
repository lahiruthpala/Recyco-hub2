<?php
class MachineModel extends Model
{
    protected $beforeInsert = [
        'Make_Machine_ID',
    ];

    protected $allowedColumns = [
        'Machine_ID',
        'Location',
        'waste_type',
        'Machine_Type',
        'Status',
        'Is_Sorting',
        'Next_Service',
    ];
    protected $table = "machine";

    public function Make_Machine_ID($data){
        $data['Machine_ID'] = generateID("MID");
        return $data;
    }
}
<?php

class WasteType extends Model
{
    protected $beforeInsert = [
        'GenerateWasteTypeID',
    ];
    protected $allowedColumns = [
        'Waste_ID',
        'Name',
        'Price',
    ];

    protected $table = "waste_type";
    function GenerateWasteTypeID($data){
        $data['Waste_ID'] = generateID("W");
        return $data;
    }
}
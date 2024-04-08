<?php

class Sectors extends Model
{
    protected $beforeInsert = [
        'GenerateSectorID',
    ];
    protected $allowedColumns = [
        'sector_ID',
        'SectorName',
        'latitude',
        'longitude',
        'radius'
    ];

    protected $table = "remarks";
    function GenerateSectorID($data){
        $data['sector_ID'] = generateID("S");
        return $data;
    }
}
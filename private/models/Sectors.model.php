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
        'radius',
        'Collector_ID',
    ];

    protected $table = "sectors";
    function GenerateSectorID($data){
        $data['sector_ID'] = generateID("S");
        return $data;
    }
}
<?php
class CollectorModel extends Model
{
    protected $beforeInsert = [
        
    ];

    protected $table = "collector_details";

    protected $allowedColumns = [
        'Collector_ID',
        'Vehicle_NO',
        'sector_ID',
        'User_ID',
        'Collections',
        'Status',
        'Priority',
    ];

}
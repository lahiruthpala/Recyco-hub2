<?php

class PickupJobs extends Model
{
    protected $beforeInsert = [
        'GenerateJob_ID',
    ];
    protected $table = "pickup_jobs";

    protected $allowedColumns = [
        'Job_ID',
        'Collector_ID',
    ];

    function GenerateJob_ID($data){
        $data['Job_ID'] = generateID("job");
        return $data;
    }

}
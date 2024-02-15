<?php

/**
 * User Model
 */
class PickUpRequestModel extends Model
{
    protected $beforeInsert = [
        'findCircleForLocation',
        'GeneratePickup_ID',
        'GetCustomer_ID'
    ];

    protected $table = "pickup_request";

    protected $allowedColumns = [
        'Pickup_ID',
        'weight',
        'Status',
        'pickup_address',
        'waste_type',
        'Requested_Date',
        'Completed_Date',
        'Review',
        'Job_ID',
        'InventoryId',
        'Customer_ID',
        'Collector_ID',
    ];

    public function areAllJobsPendingOrRejected($Pickup_ID)
    {
        $query = "SELECT COUNT(*) AS total_jobs
                  FROM pickup_request
                  WHERE Pickup_ID = :Pickup_ID
                  AND jobstatus NOT IN ('Pending', 'Rejected')";

        $result = $this->query($query, ['Pickup_ID' => $Pickup_ID]);

        // If there are no jobs with status other than 'Pending' or 'Reject', return true
        return ($result[0]->total_jobs == 0);
    }
    
    public function calculateDistance($lat1, $lng1, $lat2, $lng2)
    {
        // Convert latitude and longitude from degrees to radians
        $lat1 = deg2rad($lat1);
        $lng1 = deg2rad($lng1);
        $lat2 = deg2rad($lat2);
        $lng2 = deg2rad($lng2);

        // Calculate the distance using Haversine formula
        $dlat = $lat2 - $lat1;
        $dlng = $lng2 - $lng1;
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = 6371 * $c; // Radius of Earth in kilometers

        return $distance;
    }

    public function findCircleForLocation($data)
    {
        $query = "SELECT * FROM sectors";
        $circles = $this->query($query);
        foreach ($circles as $circle) {
            $circleCenterLat = $circle -> latitude;
            $circleCenterLng = $circle -> longitude;
            $circleRadius = $circle -> radius;

            $distance = $this->calculateDistance((float)$data['latitude'], (float)$data['longitude'], (float)$circleCenterLat, (float)$circleCenterLng);
            if ($distance <= $circleRadius) {
                $data["Collector_ID"] = $circle->Collector_ID;
                return $data; // Return the circle that the location belongs to
            }
        }
        // If no circle is found for the location
        $data["Collector_ID"] = null;
        return $data;
    }

    function GeneratePickup_ID($data){
        $data['Pickup_ID'] = generateID("pick");
        return $data;
    }

    function GetCustomer_ID($data){
        $data['Customer_ID'] = Auth::getUser_ID();
        return $data;
    }
}

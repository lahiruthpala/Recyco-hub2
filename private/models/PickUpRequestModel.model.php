<?php

/**
 * User Model
 */
class PickUpRequestModel extends Model
{
    protected $table = "pickup_request";


    public function areAllJobsPendingOrRejected($pickupId) {
        $query = "SELECT COUNT(*) AS total_jobs
                  FROM pickup_request
                  WHERE pickupId = :pickupId
                  AND jobstatus NOT IN ('Pending', 'Rejected')";
    
        $result = $this->query($query, ['pickupId' => $pickupId]);
    
        // If there are no jobs with status other than 'Pending' or 'Reject', return true
        return ($result[0]->total_jobs == 0);
    }
}
 
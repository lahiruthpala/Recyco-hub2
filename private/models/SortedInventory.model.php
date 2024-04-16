<?php

/**
 * User Model
 */
class SortedInventory extends Model
{
    protected $table = "sorted_inventory";

    protected $beforeInsert = [
        'GenerateInventoryID',
    ];
    protected $allowedColumns = [
        'Inventory_ID',
        'Type',
        'Status',
        'Weight',
        'Sorting_Job_ID'
    ];

    function GenerateInventoryID($data){
        $data['Inventory_ID'] = generateID("SI");
        return $data;
    }
}
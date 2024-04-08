<?php

/**
 * User Model
 */
class InventoryModel extends Model
{
    protected $beforeInsert = [
        'Make_Inventory_ID',
    ];

    protected $allowedColumns = [
        'Inventory_ID',
        'Status',
        'waste_type',
        'Weight',
        'Weight_After_Sorting',
        'Batch_ID',
        'Sorting_Job_ID'
    ];
    protected $table = "inventory";

    public function Make_Inventory_ID($data)
    {
        $data['Inventory_ID'] = generateID("Inven");
        return $data;
    }
}
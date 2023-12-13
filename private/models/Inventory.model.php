<?php

/**
 * User Model
 */
class Inventory extends Model
{
    protected $beforeInsert = [
        'Make_Inventory_ID',
    ];

    protected $allowedColumns = [
        'Inventory_ID',
        'Status',
        'Type',
        'Weight',
        'Batch_ID'
    ];
    protected $table = "inventory";

    public function Make_Inventory_ID($data)
    {
        $data['Inventory_ID'] = random_string(6);
        return $data;
    }
}
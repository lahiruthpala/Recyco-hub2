<?php
class AutomationModel extends Model
{
    protected $allowedColumns = [
        'Automation_ID',
        'pwd',
        'Name',
        'min',
        'hour',
        'day_of_the_month',
        'month',
        'day_of_the_week',
        'Status',
        'Code',
        'Created_By',
    ];
    protected $table = "automation";
}
<?php
class AutomationModel extends Model
{
    protected $allowedColumns = [
        'Automation_ID',
        'pwd',
    ];
    protected $table = "automation";
}
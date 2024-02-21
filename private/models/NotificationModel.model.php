<?php
class NotificationModel extends Model
{
    protected $beforeInsert = [
        'Make_Notification_ID',
    ];

    protected $allowedColumns = [
        'Notifications_ID',
        'User_ID',
        'Title',
        'Status',
        'Description',
        'Link'
    ];
    protected $table = "notifications";

    public function Make_Notification_ID($data)
    {
        $data['Notifications_ID'] = generateID("Noti".$data['User_ID']);
        return $data;
    }
}
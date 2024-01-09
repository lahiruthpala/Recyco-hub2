<?php
class Notification extends Controller
{
    function index()
	{
		$this->view('Notification/Notification');
    }
    function getNotifications()
    {
        $notification = $this->load_model('NotificationModel');
        $data = $notification->where("User_ID", Auth::getUser_ID());
        header('Content-Type: application/json');
		if ($data) {
			echo json_encode(['success' => $data]);
		} else {
			echo json_encode(['success' => false]);
		}
    }
    /*function getNotification()
    {
        $notification = $this->load_model('NotificationModel');
        $data = $notification->find($_POST['content']);
        $this->view('Notification/Notification', ['rows' => $data]);
    }
    function deleteNotification()
    {
        $notification = $this->load_model('NotificationModel');
        $data = $notification->delete($_POST['content']);
        $this->view('Notification/Notification', ['rows' => $data]);
    }
    function updateNotification()
    {
        $notification = $this->load_model('NotificationModel');
        $data = $notification->update($_POST['content']);
        $this->view('Notification/Notification', ['rows' => $data]);
    }
    function createNotification()
    {
        $notification = $this->load_model('NotificationModel');
        $data = $notification->insert($_POST['content']);
        $this->view('Notification/Notification', ['rows' => $data]);
	}*/
}
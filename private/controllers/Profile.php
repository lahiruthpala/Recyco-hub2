<?php
class Profile extends Controller
{
	function index()
	{
		// code...
		$this->view('profile');
	}

	function info()
	{
		if (!Auth::logged_in()) {
			$this->redirect('login');
			return;
		}
		$user = $this->load_model('User');
		$otp = $this->load_model('OTP');
		if (count($_POST) > 0) {
			if (count($_POST) > 1) {
				$data = $otp->insert($_POST);
				unset($_POST['Type']);
				$user->update(Auth::getUser_ID(), $_POST, 'User_ID');
				$folder = IMAGES . '/Users/';
				require_once (APP_ROOT . "/controllers/FileManager.php");
				$file = new FileManager();
				$_FILES['profileImage']['name'] = Auth::getUser_ID() . ".jpg";
				$destination = $file->uploadFile($_FILES['profileImage'], $folder);
				$this->view('otpVerify', ['data' => $_POST]);
				return;
			} else {
				$otpNum = $otp->where('User_ID', Auth::getUser_ID());
				if ($otpNum) {
					$otpNum = (array) $otpNum[0];
					$temp['Phone_verify'] = 1;
					if ($otpNum['OTP'] == $_POST['otp']) {
						$user->query("UPDATE reg_users SET Phone_verify = 1 WHERE User_ID = '" . Auth::getUser_ID() . "'");
						$otp->delete(Auth::getUser_ID(), 'User_ID');
						$this->redirect('Home');
						return;
					}
				} else {

				}
			}
		}
		$data = $user->where('User_ID', Auth::getUser_ID());
		$this->view('info', ['data' => $data]);
	}

	function Chat()
	{
		$this->view('Chat');
	}

	function viewProfile($id)
	{
		$collector = $this->load_model('CollectorModel');
		$user = $this->load_model('User');
		$user = $user->first("User_ID", $id);
		// Auth::getCollector_ID
		$data = $collector->first("Collector_ID", $id);
		$data->User_ID = $user->User_ID;
		$data->firstname = $user->FirstName;
		$data->lastname = $user->LastName;
		$data->Phone = $user->Phone;
		$data->Email = $user->Email;
		$data->Address = $user->Address;
		$this->view('Profile', ['row' => $data]);
	}
}

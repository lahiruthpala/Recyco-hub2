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
		if(!Auth::logged_in()){
			$this->redirect('login');
			return;
		}
		$user = $this->load_model('User');
		if (count($_POST) > 0) {
			$otp = $this->load_model('OTP');
			// var_dump($_POST);
			// die;
			if (count($_POST) > 1) {
				// var_dump($_POST);
				$otp->insert($_POST);
				$this->view('otpVerify');
				return;
			} else {
				$otpNum = $otp->where('User_ID', Auth::getUser_ID());
				if ($otpNum) {
					$otpNum = (array) $otpNum[0];
					$var['Phone_verify'] = 1;
					if ($otpNum['OTP'] == $_POST['otp']) {
						$user->update(Auth::getUser_ID(), $var, "User_ID");
						$otp->delete(Auth::getUser_ID(), 'User_ID');
						$this->redirect('login/userHome');
						return;
					}
				} else {

				}
			}
		}
		$this->view('info');
	}
}

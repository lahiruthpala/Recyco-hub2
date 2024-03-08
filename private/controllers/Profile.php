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
		$otp = $this->load_model('OTP');
		if (count($_POST) > 0) {
			if (count($_POST) > 1) {
				// var_dump($_POST);
				$data = $otp->insert($_POST);
				unset($_POST['Type']);
				$user->update(Auth::getUser_ID(),$_POST,'User_ID');
				$this->view('otpVerify', ['data'=>$_POST]);
				return;
			} else {
				$otpNum = $otp->where('User_ID', Auth::getUser_ID());
				if ($otpNum) {
					$otpNum = (array) $otpNum[0];
					$temp['Phone_verify'] = 1;
					if ($otpNum['OTP'] == $_POST['otp']) {
						$user->update(Auth::getUser_ID(), $temp, "User_ID");
						$otp->delete(Auth::getUser_ID(), 'User_ID');
						$this->redirect('login/userHome');
						return;
					}
				} else {

				}
			}
		}
		$data = $user->where('User_ID', Auth::getUser_ID());
		$this->view('info',['data'=>$data]);
	}
	
	function Chat(){
		$this->view('Chat');
	}
}

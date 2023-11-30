<?php
class Signup extends Controller
{
	function index()
	{
		$errors = array();
		if (count($_POST) > 0) {
			$verify = $this->load_model('Verify');
			if ($verify->validate($_POST)) {
				$_POST["pwd"] = $_POST["pwd1"];
				$verify->insert($_POST);
				// echo "You're already verified";
				// $this->redirect('login');
			} else {
				//errors
				$errors = $verify->errors;
			}
		}
		$this->view('sign-up', [
			'errors' => $errors,
		]);
	}

	function info()
	{
		$user = $this->load_model('User');
		if (count($_POST) > 0) {
			$otp = $this->load_model('OTP');
			var_dump($_POST);
			$otp->insert($_POST);
			$this->view('otpVerify');
			return;
		}
		$this->view('info');
	}
}

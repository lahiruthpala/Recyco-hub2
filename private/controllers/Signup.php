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
				$data = $verify->insert($_POST);
				message(["Your account has been created, please verify your email","success"]);
				// echo "You're already verified";
				$this->redirect('login');
			} else {
				//errors
				message(["Please check your input", "error"]);
				$errors = $verify->errors;
			}
		}
		$this->view('sign-up', [
			'errors' => $errors,
		]);
	}
}

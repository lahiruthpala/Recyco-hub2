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
}

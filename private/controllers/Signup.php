<?php
class Signup extends Controller
{

	function index()
	{
		// code...
		//print_r($_POST);
		$errors = array();
		if (count($_POST) > 0) {

			$user = $this->load_model('User');

			if ($user->validate($_POST)) {

				$_POST['Date'] = date("Y-m-d H:i:s");

				$user->insert($_POST);
				$this->redirect('login');
			} else {
				//errors
				$errors = $user->errors;
			}
		}

		$this->view('sign-up', [
			'errors' => $errors,
		]);
	}

	function info(){
		$this->view('info');
	}
}

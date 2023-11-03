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
				// $_POST['Date'] = date("Y-m-d H:i:s");
				$_POST["Role"] = "customer";
				$_POST["Address"] = "svdh656hd35";
				$_POST["pwd"] = $_POST["pwd1"];
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

<?php

/**
 * login controller
 */
class Login extends Controller
{

	function index()
	{
		// code...
		$errors = array();

		if (count($_POST) > 0) {

			$user = $this->load_model('User');
			if ($row = $user->where('Email', $_POST['Email'])) {
				$row = $row[0];
				if (password_verify($_POST['pwd'], $row->pwd)) {
					Auth::authenticate($row);
					if (in_array(Auth::getRole(), ["sorting manager", "general manager"])){
						$this->redirect('sortingmanager');
						return;
					}
					if (in_array(Auth::getRole(), ["Partner"])){
						$this->redirect('Partner');
						return;
					}
					if (in_array(Auth::getRole(), ["customer"])){
						$this->redirect('Home');
						return;
					}
				}

			}

			$errors['email'] = "Wrong email or password";

		}

		$this->view('login', [
			'errors' => $errors,
		]);
	}
}

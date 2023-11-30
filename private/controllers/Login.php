<?php

/**
 * login controller
 */
class Login extends Controller
{
	function index($id = null)
	{
		// code...
		$errors = array();

		if (count($_POST) > 0) {
			// var_dump($_POST);
			// die;
			$user = $this->load_model('User');
			if ($id != null) {
				$verify = $this->load_model('Verify');
				$verify = $verify->where('Email', $_POST['Email']);
				if ($verify) {
					$verify = (array)$verify[0];
					if (password_verify($_POST['pwd'], $verify['pwd']) && $id == $verify['code']) {
						$verify['Role'] = "customer";
						$user->insert($verify);
						$row = $user->where('Email', $_POST['Email'])[0];
						Auth::authenticate($row);
						$this->redirect('signup/info');
						return;
					}else{
						$errors['email'] = "Wrong email or password";
					}
				} else {
					$errors['verification'] = "Your verification link is no longer valied";
				}
			} else {
				if ($row = $user->where('Email', $_POST['Email'])) {
					$row = $row[0];
					if (password_verify($_POST['pwd'], $row->pwd)) {
						Auth::authenticate($row);
						if (in_array(Auth::getRole(), ["sorting manager", "general manager"])) {
							$this->redirect('sortingmanager');
							return;
						}
						if (in_array(Auth::getRole(), ["Partner"])) {
							$this->redirect('Partner');
							return;
						}
						if (in_array(Auth::getRole(), ["customer"])) {
							$this->redirect('Home');
							return;
						}
					}
				}
				$errors['email'] = "Wrong email or password";
			}
		}
		$this->view('login', [
			'errors' => $errors
		]);
	}
}

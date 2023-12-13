<?php

/**
 * login controller
 */
class Login extends Controller
{
	public function userHome()
	{
        $allowedRoles = ["SortingManager", "generalmanager", "Partner", "customer", "collector"];
        if (in_array(Auth::getRole(), $allowedRoles)) {
            $this->redirect(strtolower(Auth::getRole()));
            return;
        }
	}

	public function index($id = null)
	{
		$errors = [];

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->processLogin($id, $errors);
		}

		$this->view('login', ['errors' => $errors]);
	}

	private function processLogin($id, &$errors)
	{
		$user = $this->load_model('User');
		if ($id != null) {
			$this->processVerificationLogin($user, $id, $errors);
		} else {
			$this->processRegularLogin($user, $errors);
		}
	}

	private function processVerificationLogin($user, $id, &$errors)
	{
		$verifyModle = $this->load_model('Verify');
		$verify = $verifyModle->where('Email', $_POST['Email']);

		if ($verify) {
			$verify = (array) $verify[0];

			if (password_verify($_POST['pwd'], $verify['pwd']) && $id == $verify['code']) {
				$verify['Role'] = "customer";
				$user->insert($verify);
				$verifyModle->delete($verify['Email'], 'Email');
				$row = $user->where('Email', $_POST['Email'])[0];
				Auth::authenticate($row);
				$this->redirect('Profile/info');
				return;
			} else {
				$errors['email'] = "Wrong email or password";
			}
		} else {
			$errors['verification'] = "Your verification link is no longer valid";
		}
	}

	private function processRegularLogin($user, &$errors)
	{
		$row = $user->where('Email', $_POST['Email']);

		if ($row) {
			$row = $row[0];
			if (password_verify($_POST['pwd'], $row->pwd)) {
				Auth::authenticate($row);
				$this->userHome();
			}
		}

		$errors['email'] = "Wrong email or password";
	}
}

<?php

/**
 * login controller
 */
class Login extends Controller
{
	public function userHome()
	{
		$allowedRoles = ["SortingManager", "GeneralManager", "Partner", "Customer", "Collector", "Admin"];
		if (in_array(Auth::getRole(), $allowedRoles)) {
			$this->redirect(Auth::getRole());
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
			if (substr($id, 0, 2) == 'in') {
				$this->processVerificationLoginForEmp($user, $id, $errors);
			} else {
				$this->processVerificationLogin($user, $id, $errors);
			}
		} else {
			$this->processRegularLogin($user, $errors);
		}
	}

	private function processVerificationLoginForEmp($user, $id, &$errors)
	{
		$verifyModle = $this->load_model('Verify');
		// Check if the provided id is valid and not used by someone else.
		$verify = $verifyModle->where('Email', $_POST['Email']);
		if ($verify) {
			$verify = (array) $verify[0];
			if (password_verify($_POST['pwd'], $verify['pwd']) && $id == $verify['code']) {
				$temp['Status'] = 'Active';
				$user->update($_POST['Email'], $temp, 'Email');
				$data = $user->first('Email', $_POST['Email']);
				$this->load_model('CollectorModel')->update($data->User_ID, $temp, 'User_ID');
				$this->redirect('login/passwordReset/'.$id);
			} else {
				$errors['email'] = "Wrong email or password";
			}
		} else {
			$errors['verification'] = "Your verification link is no longer valid";
			$this->redirect('login');
		}
	}
	private function processVerificationLogin($user, $id, &$errors)
	{
		$verifyModle = $this->load_model('Verify');
		$verify = $verifyModle->where('Email', $_POST['Email']);
		if ($verify) {
			$verify = (array) $verify[0];
			if (password_verify($_POST['pwd'], $verify['pwd']) && $id == $verify['code']) {
				if ($verify['Role'] == "Customer") {
					$verify['Status'] = "Active";
					$data = $user->insert($verify);
					$data['Customer_ID'] = $data['User_ID'];
					$customer = $this->load_model('CustomerModel')->insert($data);
					$verifyModle->delete($verify['Email'], 'Email');
					$row = $user->where('Email', $_POST['Email'])[0];
					Auth::authenticate($row);
					$this->redirect('Profile/info');
					return;
				} else {
					message(["Something, Went Wrong. Please Retry", 'error']);
					$this->redirect('login');
				}
			} else {
				$errors['email'] = "Wrong email or password";
			}
		} else {
			$errors['verification'] = "Your verification link is no longer valid";
			message(['User Added successfully', 'success']);
			$this->redirect('login');
		}
	}

	private function processRegularLogin($user, &$errors)
	{
		$row = $user->where('Email', $_POST['Email']);
		if ($row) {
			$row = $row[0];
			if (password_verify($_POST['pwd'], $row->pwd)) {
				Auth::authenticate($row);
				if (Auth::getStatus() == 'Active') {
					$this->userHome();
				} else {
					$this->redirect('login');
				}
			}
		}

		$errors['email'] = "Wrong email or password";
	}

	function ForgotPassword()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user = $this->load_model('User');
			$user = $user->where('Email', $_POST['Email'])[0];
			if ($user) {
				$_POST['pwd'] = $user->pwd;
				$_POST['Role'] = 'PwdReset';
				$_POST['UserName'] = $user->UserName;
				$verify = $this->load_model('Verify');
				$verify = $verify->insert($_POST);
				message(['Reset link has sent check your email', 'success']);
				$this->redirect('login');
			} else {
				message(['Email not found', 'error']);
			}
		}
		$this->view("ForgotPassword");
	}

	function passwordReset($id)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			if (isset($_POST['Action']) && $_POST['Action'] == 'Reset') {
				if($_POST['pwd1'] != $_POST['pwd2']) {
					message(['Passwords do not match', 'error']);
					$this->redirect($_SERVER['REQUEST_URI']);
				}
				$VerifyModel = $this->load_model('Verify');
				$verify = $VerifyModel->where('code', $id);
				if ($verify) {
					$verify = (array) $verify[0];
					$user = $this->load_model('User');
					$user->update($verify['Email'], ['pwd' => password_hash($_POST['pwd1'], PASSWORD_DEFAULT)], 'Email');
					$VerifyModel->delete($verify['Email'], 'Email');
					message(['Password successfully renewed', 'error']);
					$this->redirect('login');
				} else {
					message(['Verification link expired', 'error']);
					$this->redirect('login');
				}
			}
		}
		$this->view("NewPassword");
	}
}

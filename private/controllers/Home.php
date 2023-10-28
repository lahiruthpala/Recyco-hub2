<?php
class Home extends Controller
{
	
	function index()
	{
		// code...
		$user = $this->load_model('User');
		// $data = $db->query("SELECT * FROM reg_users");
		$data = $user->where('UserName', 'customer');
		$this->view('home', ['rows' => $data]);
	}
}
?>

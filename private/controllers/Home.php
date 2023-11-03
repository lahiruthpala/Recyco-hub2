<?php
class Home extends Controller
{
	
	function index()
	{
		// code...
		// if(!Auth::logged_in()){
		// 	$this->redirect('login');
		// }
		$user = $this->load_model('User');

		// $user->insert($arr);
		// $user->update(1, $arr);
		// $data = $db->query("SELECT * FROM reg_users");
		// $user->delete(5);
		$data = $user->where('Role', 'customer');
		$this->view('home');
	}
}
?>

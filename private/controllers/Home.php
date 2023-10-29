<?php
class Home extends Controller
{
	
	function index()
	{
		// code...
		$arr["User_ID"] = "1578785";
		$arr["UserName"] = "customer56";
		$arr["Email"] = "customer2@gmail.com";
		$arr["pwd"] = "customer2pwd";
		$arr["PhoneNo"] = "2529829862862";
		$arr["Address"] = "svdh5656vfhbfd35";
		$arr["Role"] = "customer";
		$user = $this->load_model('User');

		$user->insert($arr);
		// $user->update(1, $arr);
		// $data = $db->query("SELECT * FROM reg_users");
		$user->delete(5);
		$data = $user->where('Role', 'customer');
		$this->view('home', ['rows' => $data]);
	}
}
?>

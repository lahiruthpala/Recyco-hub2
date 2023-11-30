<?php
class SortingManager extends Controller
{

	function verify(){
		if(Auth::getRole() == "SortingManager"){
			return true;
		}else{
			$this->redirect('login');
		}
	}
	function index()
	{
		if($this->verify()){
			$this->view('SortingManager/SortingManager');
		}
	}

	function authenticate(){
		$this->view("SortingManager/authenticater");
	}

	function table(){
		$this->view("SortingManager/table");
	}
}

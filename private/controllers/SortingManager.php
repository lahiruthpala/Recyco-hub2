<?php
class SortingManager extends Controller
{
	function index()
	{
		// code...
		if(!Auth::logged_in()){
			$this->redirect('login');
		}
		$this->view('SortingManager');
	}

	function authenticate(){
		$this->view("SortingManager/authenticater");
	}

	function addNewInventory(){
		$this->view("SortingManager/addNewInventory");
	}

	function table(){
		$this->view("SortingManager/table");
	}
}

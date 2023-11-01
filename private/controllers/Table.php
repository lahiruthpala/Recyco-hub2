<?php
class Table extends Controller
{
	function index()
	{
		$user = $this->load_model('TableModel');
		$data = $user->findAll();
		$this->view('SortingManager/table', ['rows'=>$data]);
	}

	// function authenticate(){
	// 	$this->view("SortingManager/authenticater");
	// }

	// function addNewInventory(){
	// 	$this->view("SortingManager/addNewInventory");
	// }

	// function table(){
	// 	$this->view("SortingManager/table");
	// }
}

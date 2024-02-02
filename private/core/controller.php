<?php

/**
 * main controller class
 */
class Controller
{
	public function view($view, $data = array())
	{
		extract($data);
		// code...
		// echo $view;
		if (file_exists("../private/views/" . $view . ".view.php")) {
			require("../private/views/" . $view . ".view.php");
		} else {
			require("../private/views/404.view.php");
		}
	}


	public function load_model($model)
	{
		if (class_exists($model)) {
			return new $model();
		}
		if (file_exists("../private/models/" . $model . ".model.php")) {
			require("../private/models/" . $model . ".model.php");
			return new $model();
		} else {
			require("../private/views/404.view.php");

		}
	}

	public function redirect($link)
	{
		header("location: " . ROOT . "/" . trim($link, '/'));
	}
}
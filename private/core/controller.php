<?php 

/**
 * main controller class
 */
class Controller
{
	
	public function view($view,$data = array())
	{
		extract($data);
		// code...
		echo $view;
		if(file_exists("../private/views/" . $view . ".view.php"))
		{
			require ("../private/views/" . $view . ".view.php");
		}else{
			require ("../private/views/404.view.php");
		}
	}

	public function load_model($modle){
		if(file_exists("../private/models/" . $modle . ".model.php"))
		{
			require ("../private/models/" . $modle . ".model.php");
			return new $modle();
		}else{
			require ("../private/views/404.view.php");
		}
	}
}
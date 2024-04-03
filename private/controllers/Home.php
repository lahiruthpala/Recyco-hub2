<?php
class Home extends Controller
{
	
	function index()
	{
		$this->view('/Home/index');
	}

	function Article(){
		$articles = $this->load_model('Articles');
		$data = $articles->findAll(1, 10, "Article_ID");
		$this->view('/Home/Article',['articles' => $data]);
	}
}
?>

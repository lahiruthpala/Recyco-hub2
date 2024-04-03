<?php
require_once '../vendor/autoload.php';
use \EditorJS\EditorJS;
class Home extends Controller
{

	function index()
	{
		$this->view('/Home/index');
	}

	function Article()
	{
		$articles = $this->load_model('Articles');
		$data = $articles->findAll(1, 10, "Article_ID");
		$this->view('/Home/Article', ['articles' => $data]);
	}

	function ArticleDetail($id)
	{
		$articles = $this->load_model('Articles');
		$data = $articles->first("Article_ID",$id);
		$article = $this->json_to_html($data->Data);
		var_dump($article);
		die;
		$this->view('/Home/ArticleDetail', ['article' => $data]);
	}

	private function json_to_html($json)
	{
		// Start output buffer
		ob_start();
		// Parse JSON
		$editor = new EditorJS();
		$editor->parse($json, function ($block) {
			return BlockFactory::createBlock($block);
		});
		// Render editor
		$editor->render();
		// Get HTML
		$html = ob_get_contents();
		// End output buffer
		ob_end_clean();
		return $html;
	}
}
?>
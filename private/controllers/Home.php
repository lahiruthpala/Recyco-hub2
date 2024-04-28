<?php
require_once '../vendor/autoload.php';
use \EditorJS\EditorJS;
class Home extends Controller
{

	function index()
	{
		$testimonial = $this->load_model('Testimonial');
		$testimonials = $testimonial->query("SELECT * FROM testimonial T JOIN reg_users U ON T.User_ID=U.User_ID;");

		$event = $this->load_model('Event');
		$data = $event->findAll(1,3,"Event_ID");

		$this->view('/Home/index',['events'=>$data,'testimonials'=>$testimonials]);
	}

	function Article()
	{
		$articles = $this->load_model('Articles');
		$data = $articles->query("SELECT A.*, P.Company_Name FROM articles A JOIN partner P ON A.Partner_ID=P.Partner_ID ORDER BY A.Published_Date DESC LIMIT 10 OFFSET 0;");
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
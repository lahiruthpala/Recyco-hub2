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
		$data = $event->findAll(1, 3, "Event_ID");

		$this->view('/Home/index', ['events' => $data, 'testimonials' => $testimonials]);
	}

	function Article()
	{
		$articles = $this->load_model('Articles');
		$data = $articles->query("SELECT A.*, P.Company_Name FROM articles A JOIN partner P ON A.Partner_ID=P.Partner_ID WHERE A.Status='Published' ORDER BY A.Published_Date DESC LIMIT 10 OFFSET 0;");
		$this->view('/Home/Article', ['articles' => $data]);
	}

	function ArticleDetail($id)
	{
		$articles = $this->load_model('Articles');
		$data = $articles->first("Article_ID", $id);
		$article = $this->json_to_html($data->Data);
		$data = $articles->query("SELECT A.*, P.Company_Name FROM articles A JOIN partner P ON A.Partner_ID=P.Partner_ID ORDER BY A.Published_Date DESC LIMIT 6 OFFSET 0;");
		$this->view('/Home/ArticleDetail', ['articles' => $data, 'article_html' => $article]);
	}

	private function json_to_html($json)
	{
		// Get an array of HTML based on original blocks
		$result = edjsHTML::parse($json);

		// Enclose in <section> for display
		$sections = array_map(function ($section) {
			return "<section>$section</section>";
		}, $result);

		// Join for output
		$html = implode("", $sections);
		return($html);
	}
}
?>
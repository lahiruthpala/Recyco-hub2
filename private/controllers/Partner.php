<?php
class Partner extends Controller
{

    function index()
    {
        // code...
        $articles = $this->load_model('Articles');
        $data = $articles->findAll();
        $this->view("Partner/articles", ["articles" => $data]);
    }

    function Articles()
    {
        $articles = $this->load_model('Articles');
        $data = $articles->findAll();
        $this->view("Partner/articles", ["articles" => $data]);
    }

    function addNew($id = null)
    {
        $errors = array();
        if ($id == null) {
            print_r($_POST);
            die;
            if (count($_POST) > 0) {
                $articles = $this->load_model('Articles');
                $articles->insert($_POST);
                $this->redirect("Partner/articles");
            }
            $this->view("Partner/newarticle");
        } else {
            if (count($_POST) > 0) {
                $articles = $this->load_model('Articles');
                $articles->insert($_POST);
                $this->redirect("Partner/articles");
            }
            $articles = $this->load_model('Articles');
            $data = $articles->first('Article_ID', $id);
            $articles->delete($id, "Article_ID");
            $this->view("Partner/newarticle", ["article" => $data]);
        }
    }

    function ArticleDelete($id)
    {
        $article = $this->load_model('Articles');
        $data = $article->findAll();
        $this->view("Partner/articles", ["articles" => $data]);
    }
}

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
        if ($id == null) {
            $errors = array();
            if (count($_POST) > 0) {
                $articles = $this->load_model('Articles');
                $articles->insert($_POST);
                $this->redirect("Partner/articles");
            }
            $this->view("Partner/newarticle");
        }else{
            $errors = array();
            if (count($_POST) > 0) {
                $articles = $this->load_model('Articles');
                $articles->update($_POST);
                $this->redirect("Partner/articles");
            }
            $articles = $this->load_model('Articles');
            $data = $articles->first('id', $id);
            $this->view("Partner/newarticle", ["article" => $data]);
        }
    }

    function delete($id)
    {
        $errors = array();
        if (count($_POST) > 0) {
            $articles = $this->load_model('Articles');
            $articles->delete($_POST['id'], );
            $this->redirect("Partner/articles");
        }
        $this->view("Partner/newarticle");
    }
}

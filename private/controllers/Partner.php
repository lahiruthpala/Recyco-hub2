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

    function Articles($Pid=null)
    {
        $articles = $this->load_model('Articles');
        if($Pid!=null){
            $data = $articles->where("Partner_ID", $Pid);
        }else{
            $data = $articles->findAll();
        }
        $this->view("Partner/articles", ["articles" => $data]);
    }

    function addNew($id = null)
    {
        $errors = array();
        if ($id == null) {
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
        $article->delete($id, "Article_ID");
        $data = $article->findAll();
        $this->view("Partner/articles", ["articles" => $data]);
    }

    function Events()
    {
        $events = $this->load_model('Event');
        $data = $events->findAll();
        $this->view("Partner/events", ["articles" => $data]);
    }

    function addNewEvent($id = null)
    {
        $errors = array();
        if ($id == null) {
            if (count($_POST) > 0) {
                $articles = $this->load_model('Event');
                $articles->insert($_POST);
                $this->redirect("Partner/events");
            }
            $this->view("Partner/newevent");
        } else {
            if (count($_POST) > 0) {
                $articles = $this->load_model('Event');
                $articles->insert($_POST);
                $this->redirect("Partner/events");
            }
            $articles = $this->load_model('Event');
            $data = $articles->first('Event_ID', $id);
            $articles->delete($id, "Event_ID");
            $this->view("Partner/newevent", ["article" => $data]);
        }
    }

    function EventDelete($id)
    {
        $article = $this->load_model('Articles');
        $article->delete($id, "Article_ID");
        $data = $article->findAll();
        $this->view("Partner/articles", ["articles" => $data]);
    }
}

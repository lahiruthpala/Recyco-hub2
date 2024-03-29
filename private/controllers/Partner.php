<?php
class Partner extends Controller
{

    function index()
    {
        // code...
        $articles = $this->load_model('Articles');
        $data = $articles->findAll(1, 10, "Article_ID");
        $this->view("Partner/Articles", ["articles" => $data]);
    }

    function Articles($Pid = null)
    {
        $articles = $this->load_model('Articles');
        if ($Pid != null) {
            $data = $articles->where("Partner_ID", $Pid);
        } else {
            $data = $articles->findAll(1, 10, "Article_ID");
        }
        $this->view("Partner/Articles", ["articles" => $data]);
    }

    function addNew($id = null)
    {
        if (isset($_FILES["image"])) {
            $response = array();
            $target_dir = "./images/Article/";
            require_once(APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            $destination = $file->uploadFile($_FILES['image'], $target_dir);
            $response["success"] = 1;
            $response["file"]["url"] = ROOT . "/images/Article/" . $_FILES['image']['name'];
            echo json_encode($response);
            return;
        }
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $articles = $this->load_model('Articles');
            $_POST['Edit_Date'] = date("Y-m-d H:i:s");
            if(isset($_POST['Action']) && $_POST['Action'] == 'Publish'){
                $_POST['Published_Date'] = date("Y-m-d H:i:s");
                $_POST['Status'] = 'Published';
            }
            $data = $articles->insert($_POST);
            $this->redirect("Partner/articles");
        }

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

    function uploadImage()
    {
        die;
        if (isset($_FILES["file"])) {
            $response = array();
            $target_dir = ROOT . "images/Aricals";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($_SERVER["REQUEST_METHOD"] == "POST" && move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $response["success"] = 1;
                $response["file"]["url"] = $target_file;
                echo json_encode($response);
            }
        }
    }

    function ArticleDelete($id)
    {
        $article = $this->load_model('Articles');
        $article->delete($id, "Article_ID");
        $data = $article->findAll();
        $this->view("Partner/Articles", ["articles" => $data]);
    }

    function Events()
    {
        $events = $this->load_model('Event');
        $data = $events->findAll(1, 10, "Event_ID");
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
        $this->view("Partner/Articles", ["articles" => $data]);
    }

    function edit()
    {
        $this->view('Partner/Edit');
    }
}

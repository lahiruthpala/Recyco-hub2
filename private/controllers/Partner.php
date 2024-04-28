<?php
class Partner extends Controller
{

    function __construct()
    {
        $this->verify();
    }

    function verify()
    {
        $allowedRoles = ["Partner"];
        if (in_array(Auth::getRole(), $allowedRoles)) {
            return true;
        } else {
            $this->redirect('login');
        }
    }
    function index()
    {
        // code...
        $articles = $this->load_model('Articles');
        $data = $articles->findAll(1, 10, "Article_ID");
        $this->view("Partner/Articles");
    }

    function PublishedArticles()
    {
        $articles = $this->load_model('Articles');
        $data = $articles->where("Status", "Published");
        $this->view("Partner/Articles/PublishedArticles", ["articles" => $data]);
    }

    function DraftsArticles()
    {
        $articles = $this->load_model('Articles');
        $data = $articles->where("Status", "Draft");
        $this->view("Partner/Articles/DraftsArticles", ["articles" => $data]);
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

    function EditArticle($id)
    {
        $articles = $this->load_model('Articles');
        if (isset($_FILES["image"])) {
            $response = array();
            $target_dir = "./images/Article/";
            require_once (APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            $destination = $file->uploadFile($_FILES['image'], $target_dir);
            $response["success"] = 1;
            $response["file"]["url"] = ROOT . "/images/Article/" . $_FILES['image']['name'];
            echo json_encode($response);
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['Edit_Date'] = date("Y-m-d H:i:s");
            if (isset($_POST['Action']) && $_POST['Action'] == 'Publish') {
                $_POST['Published_Date'] = date("Y-m-d H:i:s");
                $_POST['Status'] = 'Published';
            }
            $data = $articles->update($id, $_POST, "Article_ID");
            $this->redirect("Partner/articles");
        }
        $data = $articles->first('Article_ID', $id);
        $this->view("Partner/Articles/Edit", ["article" => $data]);
    }
    function AddNewArticle($id = null)
    {
        if (isset($_FILES["image"])) {
            $response = array();
            $target_dir = "./images/Article/";
            require_once (APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            $destination = $file->uploadFile($_FILES['image'], $target_dir);
            $response["success"] = 1;
            $response["file"]["url"] = ROOT . "/images/Article/" . $_FILES['image']['name'];
            echo json_encode($response);
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $articles = $this->load_model('Articles');
            $_POST['Edit_Date'] = date("Y-m-d H:i:s");
            if (isset($_POST['Action']) && $_POST['Action'] == 'Publish') {
                $_POST['Published_Date'] = date("Y-m-d H:i:s");
                $_POST['Status'] = 'Published';
            }
            $data = $articles->insert($_POST);
            $target_dir = "./images/Article/";
            require_once (APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            $destination = $file->uploadFile($_FILES['imageInput'], $target_dir, $data['Article_ID'].'.jpg');
            $this->redirect("Partner");
        }
        $this->view("Partner/newarticle");
    }

    function ArticleDelete($id)
    {
        $article = $this->load_model('Articles');
        $article->delete($id, "Article_ID");
        $this->redirect("Partner/articles");
    }

    function EditEvent($id){
        $articles = $this->load_model('Event');
        if (isset($_FILES["image"])) {
            $response = array();
            $target_dir = "./images/Events/";
            require_once (APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            $destination = $file->uploadFile($_FILES['image'], $target_dir);
            $response["success"] = 1;
            $response["file"]["url"] = ROOT . "/images/Events/" . $_FILES['image']['name'];
            echo json_encode($response);
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $_POST['Edit_Date'] = date("Y-m-d H:i:s");
            if (isset($_POST['Action']) && $_POST['Action'] == 'Publish') {
                $_POST['Published_Date'] = date("Y-m-d H:i:s");
                $_POST['Status'] = 'Published';
            }
            $data = $articles->update($id, $_POST, "Article_ID");
            $this->redirect("Partner/articles");
        }
        $data = $articles->first('Article_ID', $id);
        $this->view("Partner/Articles/Edit", ["article" => $data]);
    }

    function Events()
    {
        $events = $this->load_model('Event');
        $this->view("Partner/events");
    }

    function UpcomingEvents()
    {
        $events = $this->load_model('Event');
        $data = $events->where("Status", "UpComing");
        $this->view("Partner/Events/UpcomingEvents", ["Events" => $data]);
    }

    function AddNewEvent($id = null)
    {
        if (isset($_FILES["image"])) {
            $response = array();
            $target_dir = "./images/Events/";
            require_once (APP_ROOT . "/controllers/FileManager.php");
            $file = new FileManager();
            $destination = $file->uploadFile($_FILES['image'], $target_dir);
            $response["success"] = 1;
            $response["file"]["url"] = ROOT . "/images/Events/" . $_FILES['image']['name'];
            echo json_encode($response);
            return;
        }
        if (count($_POST) > 0) {
            $articles = $this->load_model('Event');
            $_POST['Edit_Date'] = date("Y-m-d H:i:s");
            if (isset($_POST['Action']) && $_POST['Action'] == 'Publish') {
                $_POST['Published_Date'] = date("Y-m-d H:i:s");
                $_POST['Status'] = 'UpComing';
            }
            $data = $articles->insert($_POST);
        }
        $this->view("Partner/Events/NewEvent");
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

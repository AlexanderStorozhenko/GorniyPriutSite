<?php
require_once "models/News.php";
require_once "models/Text.php";

class HomeController extends Controller
{
    private $newsModel;
    private $textModel;
    
    public function __construct()
    {
        $this->newsModel = new News();
        $this->textModel = new Text();
    }

    public function getDefaultAction()
    {
        $data = ["text"=>$this->textModel->getText(0), "news" => $this->newsModel->getNews()];
        parent::response("main.php", $data);
    }

    public function postMailAction()
    {
        if (!empty($_POST)) {
            if (!empty($_POST["name"])  && !empty($_POST["phone"]) && !empty($_POST["title"]) && !empty($_POST["text"])) {
                echo json_encode(["success"=>true]);
                return;
            }
        }
        echo json_encode(["success"=>false]);
    }

    public function getNewsJsonAction(){
        $data = $this->newsModel->getNews();
        echo json_encode($data);
    }

    public function postNewAction($title,$date,$text){
         $this->newsModel->insertNew($title,$date,$text);
         echo json_encode(["success"=>true]);
    }


    public function postDescriptionAction($text) {
        $this->textModel->changeDescription($text);
    }
}
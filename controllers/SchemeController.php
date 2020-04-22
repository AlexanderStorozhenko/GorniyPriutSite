<?php
class SchemeController extends Controller{

    private $newsModel;
    public function __construct()
    {
        $this->newsModel = new News();
    }
    public function getDefaultAction()
    {
        $data = ["news"=> $this->newsModel->getNews()];
        self::response("scheme.php",$data);
    }
}
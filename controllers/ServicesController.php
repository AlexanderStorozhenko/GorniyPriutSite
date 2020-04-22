<?php
require_once "models/Service.php";

class ServicesController extends Controller
{
    private $newsModel;
    private $serviceModel;

    public function __construct()
    {
        $this->newsModel = new News();
        $this->serviceModel = new Service();
    }

    public function getDefaultAction()
    {
        $this->newsModel = new News();
        $data = ["services" => $this->serviceModel->getServices(),
            "news" => $this->newsModel->getNews()
        ];
        //var_dump($data);
        parent::response("services.php", $data);
    }
}
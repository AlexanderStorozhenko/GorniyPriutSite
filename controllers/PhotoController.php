<?php
require_once "models/Photo.php";
require_once "models/News.php";
class PhotoController extends Controller
{
    private $newsModel;
    private $photoModel;
    const LIMIT = 10;

    public function __construct()
    {
        $this->photoModel = new Photo();
        $this->newsModel = new News();
    }


    public function getDefaultAction($page)
    {
        $page = intval($page) - 1  < 0 ? 0 : intval($page) - 1;

        $res = $this->photoModel->getPhotos($page * self::LIMIT, self::LIMIT);
        $pagination =$this->photoModel->getPhotosCnt();

        $sizes = [];

        for($i=0;$i<count($res);$i++) $sizes[]=rand(1,6);

        $data = ["news"=> $this->newsModel->getNews(), "images"=>[$res], "pagination"=>ceil($pagination/self::LIMIT), "sizes"=>$sizes];

        self::response("photos.php",$data);

    }

}
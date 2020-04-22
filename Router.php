<?php

class Router
{
    private static $controllers =[
        "HomeController",
        "BooksController",
        "AuthorsController",
        "ErrorController"
    ];

    public static function getPage()
    {
        $data= ["controller"=>"Error","action"=>"getDefault","id"=>"","parameters"=>[]];
        $url = explode('/', $_SERVER["REQUEST_URI"]);
        $parameters = explode('?', end($url));

        if($url[1] && in_array(ucfirst($url[1]."Controller"),self::$controllers))
            $data['controller'] = $url[1] . "Controller";
        elseif (empty($url[1]))
            $data['controller'] = "HomeController";
        else {
            $err = new ErrorController();
            $err->getDefaultAction();
            exit;
        };

        $controller="";

        eval("\$controller=new ".$data['controller']."();");

        if($url[2] && method_exists($controller,"get".$url[2]."Action"))
            $data['action'] = 'get'.$url[2] . "Action";
        elseif (empty($url[2]))
            $data['action'] = "getDefaultAction";
        else $data['action'] =  "getPage404Action";

        $data['id'] = $url[3] ? Helper::toTbStr($url[3]) : false;

        eval("\$controller"."->".$data['action']."(\$data['id']);");
    }


}

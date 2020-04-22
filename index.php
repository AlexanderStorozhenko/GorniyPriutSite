<?php
require_once "Db.php";
require_once "core/Controller.php";
require_once "core/Model.php";
require_once "controllers/ErrorController.php";
require_once "controllers/HomeController.php";
require_once "controllers/ServicesController.php";
require_once "controllers/SchemeController.php";
require_once "controllers/PhotoController.php";
require_once "models/Service.php";
require_once "Helper.php";

$controllers = [
    "Home",
    "Services",
    "Scheme",
    "Error",
    "Photo",
];

$url = explode('/', $_SERVER["REQUEST_URI"]);
$url[count($url) - 1] = explode('?', end($url))[0];
$controller = empty(ucfirst($url[1])) ? "Home" : ucfirst($url[1]);
$action = empty($url[2]) ? "Default" : $url[2];
$k = '';
$type = $_SERVER["REQUEST_METHOD"];

if (in_array($controller, $controllers)) {

    eval("\$k = new $controller" . "Controller;");

    $reflection = new ReflectionMethod($k, $type . $action . "Action");

    if ($reflection != null) {
        $args = [];

        if ($type == "GET" && !empty($_GET)) {

            foreach ($_GET as $k1 => $v)
                $args[] = Helper::toTbStr($v);

        } else if ($type == "POST" && !empty($_POST)) {

            foreach ($_POST as $k1 => $v)
                $args[] = Helper::toTbStr($v);
        }

        $paramsCnt= $reflection->getNumberOfParameters();

        if ($paramsCnt == count($args)) {
            $args = implode(',', $args);
            eval("\$k->$type$action" . "Action" . "($args);");
        }
        else {
            $args = array_fill(0,$paramsCnt,0);
            $args = implode(',', $args);
            eval("\$k->$type$action" . "Action" . "($args);");
        }
    } else {
        eval("\$k = new ErrorController;");
        eval("\$k->getDefaultAction();");
    }

} else {
    eval("\$k = new ErrorController;");
    eval("\$k->getDefaultAction();");
}






    	

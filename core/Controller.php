<?php
class Controller{

    protected static function response($content,$data =null,  $wrapper=true){
        $content = ["content"=> 'views/'.$content];

        if($wrapper)
            require_once 'views/wrapper.php';
    }
}
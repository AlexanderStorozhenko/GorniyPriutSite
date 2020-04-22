<?php
class News{
    const TABLE_NAME= "news";
    
    public function getNews(){
       return DB::getInstance()->select()->selectBuild(self::TABLE_NAME);
    }

    public function insertNew($title,$date,$text){

    	DB::getInstance()->insert([
    		'DEFAULT',
    		Helper::toTbStr($title),
    		Helper::toTbStr($date),
    		Helper::toTbStr($text)])->insertBuild(self::TABLE_NAME);

    }

   
}
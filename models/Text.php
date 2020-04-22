<?php
class Text{
    const TABLE_NAME = "text";

    public function __construct()
    {
    }

    public function getText($id){
        return DB::getInstance()->select()->where(["id"=>intval($id)])->selectBuild(self::TABLE_NAME);
    }

    public function changeDescription($text){
    	return DB::getInstance()->update(["text"=>Helper::toTbStr($text)])->where(["id"=>0])->updateBuild(self::TABLE_NAME);
    }
}
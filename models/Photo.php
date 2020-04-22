<?php
class Photo{
    const TABLE_NAME = "photos";
    public function __construct()
    {
    }
    public function getPhotos($offset,$limit){
        return DB::getInstance()->select(['path'])->limit(["offset"=>$offset,"limit"=>$limit])->selectBuild(self::TABLE_NAME);
    }
    public function getPhotosCnt(){
        return DB::getInstance()->select(['COUNT(path) as cnt'])->selectBuild(self::TABLE_NAME)[0]['cnt'];
    }

}

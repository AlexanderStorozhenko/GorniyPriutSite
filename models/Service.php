<?php
class Service{
    const TABLE_NAME = "services";

    public function __construct()
    {
    }

    public function getServices(){
        return DB::getInstance()->select()->selectBuild(self::TABLE_NAME);
    }
}
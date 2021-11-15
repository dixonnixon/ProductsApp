<?php
namespace sys;
interface ConnectInfo
{
    const HOST ="db"; //as docker said
    const UNAME ="admin";
    const PW ="admin";
    const DBNAME = "products";
    const PORT = "3306";
    public static function doConnect($test);
}


?>
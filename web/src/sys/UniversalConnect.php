<?php
namespace sys;

class UniversalConnect implements ConnectInfo
{
    private static $server  = ConnectInfo::HOST;
    private static $db      = ConnectInfo::DBNAME;
    private static $user    = ConnectInfo::UNAME;
    private static $pass    = ConnectInfo::PW;
    private static $port    = ConnectInfo::PORT;
    private static $hookup;

    public static function doConnect($test=null) 
    {

        $options = array(
                            // \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE    => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        if(!self::$hookup && is_null(self::$hookup)) {
            try {
                self::$hookup = new \PDO(
                    "mysql:dbname=" . self::$db 
                        . ";host=" . self::$server
                        . ";port=" . self::$port,
                    self::$user,
                    self::$pass,
                    $options
                );
            } catch(\PDOException $e) {
                echo $e->getMessage();
                exit;
            }

            if(self::$hookup) {
                ($test == "test") ? print "Connection successfull: " : "";
            } else {
                echo('<br>The Reason is: ' . self::$hookup->errorCode() . "<br>");
                echo "<pre>";
                print_r(self::$hookup->errorInfo());
                echo "</pre>";
            }
        }
        return self::$hookup;
    }
}


?>
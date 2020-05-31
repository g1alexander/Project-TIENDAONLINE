<?php 
require_once "config/config.php";
class Database{
    static $host = HOST;
    static $user = USER;
    static $password = PASSWORD;
    static $database = DB;
    public static function getConnection(){
        return new mysqli(self::$host, self::$user, self::$password, self::$database);
    }
    public static function connect(){
        $db = new mysqli(self::$host, self::$user, self::$password, self::$database);
        $db ->query("SET NAMES 'utf8'");
        return $db;
    }
}

?>
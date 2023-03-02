<?php

require_once 'dotenv.php';
(new DotEnv(__DIR__ . '/.env'))->load();

class DBClass {
   
    public static function connect(){
       $connection = null;
          
       try{
           $connection = new PDO("pgsql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWD"]);
           $connection->exec("set names utf8");
       }catch(PDOException $exception){
           echo "Error: " . $exception->getMessage();
       }
       return $connection;
    }
}

?>
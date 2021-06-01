<?php

namespace assets\php;
use PDO;
use PDOException;

class Database {

    protected $connection;
    
    public function __construct()
    {
        $host       = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "gvl_db";
        $dsn        = "mysql:host=$host;dbname=$dbname";
        $options    = array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    );
        try{
            $this->connection = new PDO($dsn, $username, $password, $options);
        }catch(PDOException $error){
            echo 'Oh jeetje.. Check je database gegevens.. ';
        }
    }

}


?>
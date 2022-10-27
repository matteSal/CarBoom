<?php

class Config {



    private $host = "localhost";



    private $user = "root";



    private $password = "";



    private $db = "CarBoom";



    public function connect() {
        try{
            $connection = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        }catch(PDOException $error){
            echo "connection failed" . $error->getMessage();
        }
    }

}

?>
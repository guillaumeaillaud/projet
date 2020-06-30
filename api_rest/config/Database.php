<?php

class Database {
    //connexion a la base de donnees
    private $host = "localhost";
    private $dbname = "api_rest";
    private $username = "root";
    private $password = "";
    public $connexion;


    // getter pour la connexion
    public function getConnection(){

        $this->connexion = null;

        try {
            $this->connexion = new PDO("mysql:host=" . $this->host . "dbname=" . $this->dbname,
            $this->username, $this->password);
            $this->connexion->exec("set names utf8");
        } catch (PDOException $exception) {
            echo 'erreur de connexion : ' .$exception->getMessage();
        }

        return $this->connexion;
    }


}

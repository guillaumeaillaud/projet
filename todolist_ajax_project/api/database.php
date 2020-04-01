<?php

require_once "config.php";

class Database
{
    // cette propriete va contenir l'instance de la classe PDO
    public $conn;

    // on declare les proprietes 
    private $dsn;
    private $username;
    private $pwd;
    private $options;

     // on declare les methodes

    // le constructeur est execute immediatement lors de la creation d'une nouvelle instance de la classe (un nouvel objet)
    public function __construct()
    {
        // ici on va set les propriétés de la classe avec les valeurs de notre config
        $this->dsn = DSN;
        $this->username = USERNAME;
        $this->pwd = PWD;
        $this->options = OPTIONS;
    }

    public function connect(){
        try {
            // on va stocker dans la propriété de classe conn une nouvelle instance de l'objet PDO
            $this->conn = new PDO($this->dsn, $this->username, $this->pwd, $this->options);
            echo "connexion etablie";
        } catch (PDOException $error) {
            echo "error:" .$error->getMessage();
        }

        return $this->conn;
    }

}



// exemple pour tester si la connexion a la bdd fonctionne en creant un ogjet
// $objet = new Database();
// $pdo = $objet->connect();



// pour exemple seulement :

// class User
// {
        // propriétés de classe
//     public $name;
//     public $address;
//     public $country;

//     // méthodes de classe
//     public function __construct($name, $address, $country)
//     {
//         $this->name = $name;
//         $this->address = $address;
//         $this->country = $country;
//     }
// }

// instanciation de la classe
// $user1 = new User('lionel', 'Marseille', 'France');
// $name = $user1->name;

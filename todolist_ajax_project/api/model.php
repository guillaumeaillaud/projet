<?php

// on a besoin d'une connexion a la bdd

require_once "database.php";


// on a besoin d'une classe qui va gerer les interactions avec la bdd
//CRUD

class Model
{

    public function getTodos()
    {

        $pdo = $this->getConnection();

        $query = "SELECT * FROM todos"; // ceci est juste une chaine de caracteres

        $PdoStatement = $pdo->prepare($query);

        $PdoStatement->execute();

        //debug : affichage resultat
        print_r($PdoStatement->fetchAll());


    }

    public function creatTodos($todos){

        // etablir une connexion a la db
        $pdo = $this->getConnection();

        //ecrire la requete en insertion
        $query = 'INSERT INTO todos (title,description) VALUES (:title, :description)';

        // preparer la requete
        $PdoStatement = $pdo->prepare($query);

        //executer la requete en passant les bonnes valeurs
         //retourner le resultat de la requete (dans notre cas true ou false)
        return $PdoStatement->execute($todos);

    }

    public function deleteTodos($todos)
    {
        // TODO établir une connexion à la db
        $pdo = $this->getConnection();

        // TODO écrire la requête en delete
        $query = 'DELETE FROM todos WHERE id = :id';
        // TODO préparer la requête
        $PdoStatement = $pdo->prepare($query);

        // TODO exécuter la requête en passant la bonne valeur
        // TODO retourner le résultat de la requête (dans notre cas true ou false)
        $values = [
            "id" => $todos["id"],
        ];
        return $PdoStatement->execute($todos);
    }
  
    

    // on creer une methode qui va nous permettre de creer une nouvelle instance de la classe database et qui va retourner un objet PDO
    // cette methode sera privee, elle ne sera accessible que depuis cette classe
    private function getConnection()
    {
        // on va creer une nouvelle instance de database
        $db = new Database();
        // ici je retourne un objet PDO que je pourrais utitliser pour mes requetes 
        return $db->connect();
    }

  

}

$model = new Model();

$response = $model->deleteTodos([
   "id" => "2",
]);

var_dump($response);

// $model->getTodos();
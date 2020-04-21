<?php

// je traite le formulaire de creation de la todolist

if (count($_REQUEST) > 0){

    $tabAssoColonneValeur = [
        "title" => $_REQUEST["title"],
        "description" => $_REQUEST["description"],
    ];

    // je vais construire la requete sql INSERT
    //pour la securité on ne va pas concatener les elements exterieur

$requeteSQL =

<<<CODESQL
INSERT INTO data_long
(title, description)
VALUES
(:title, :description)

CODESQL;

// on envois la requete sql
//je charge le code php pour envoyer

require_once "model.php";

// debug

//$pdoStatement->debugDumpParams();

echo "votre todo a été publiée ";



}   


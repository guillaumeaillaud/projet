<?php

//valable pour n'importe quelle requete SQL
// CREATE
//READ
//UPDATE
//DELETE

// connecter php a sql

$pdo = new PDO("mysql:host=localhost;dbname=todo_long;charset=utf8;", "root", "");

// on envois la, requete preparee
//$pdoStatement est un container qui englobe les resultat de la requete sql
$pdoStatement = $pdo->prepare($requeteSQL);

//on fournis les donnees exterieur a part

$pdoStatement->execute($tabAssoColonneValeur);
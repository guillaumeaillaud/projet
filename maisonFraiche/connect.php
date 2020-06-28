<?php

try {
    //Connection a la base
    $db = new PDO('mysql:host=localhost;dbname=crudMF', 'root', '');
    $db->exec('SET NAMES "UTF8 "');

} catch (PDOException $e) {
    //PDOExeption servira pour envoyer une erreur si la connection a la bdd ne s'effectue pas
    echo'Erreur : '.$e->getMessage();
    die();
}
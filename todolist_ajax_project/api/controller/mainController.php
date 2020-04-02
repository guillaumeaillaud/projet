<?php
// je dois importer mon model et mon todoController ici

require_once "../model.php";
require_once "todoController.php";

// je créer mes instances de classe Model et todocontroller

$model = new Model();

// on crée une nouvelle instance de la classe TodoController et on lui passe l'instance de la classe Model su'on vient de créer
$controller = new todoController($model);

// en fonction de la requete JS que je vais recevoir, je vais faire differentes actions
// pour connaitre le type de requete on peut utiliser la super globale $_SERVER
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    # je vais gerer les requetes en GET
    $controller->getAll();
} 

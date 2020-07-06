<?php

// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées en json 
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: GET");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $_SERVER sert a verifier si la methode de la requet utilisé par le post client est la bonne (GET) on fait donc une condition

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // si la methode est la bonne on inclus tt les fichiers dont on a besoin pour la connexion a la bdd
    include_once "../config/Database.php";
    include_once "../models/Produits.php";

    // on instancie la base de données
     $database = new Database();
     $db = $database->getConnection();

}else{
    // on gere l'erreur
    // 405 le methode utilisée n'est pas la autorisée
    http_response_code(405);
    // on encode la reponse en json car c'est le format qu'on a definit dans le header, la reponse sera un tableau
    echo json_encode(["message" => "La methode utilisée n'est pas la bonne"]);
}
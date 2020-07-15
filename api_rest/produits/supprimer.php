<?php

// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées en json 
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée
header("Access-Control-Allow-Methods: DELETE");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $_SERVER sert a verifier si la methode de la requet utilisé par le post client est la bonne (DELETE) on fait donc une condition
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // si la methode est la bonne on inclus tt les fichiers dont on a besoin pour la connexion a la bdd
    include_once "../config/Database.php";
    include_once "../models/Produits.php";

    // on instancie la base de données
    $database = new Database();
    // dans $db on a notre connexion
    $db = $database->getConnection();

    // on va initialiser un produit pour cela on instancie les produits
    $produit = new Produits($db);

    //on va recuperer l'id du produit
    $donnees = json_decode(file_get_contents("php://input"));
    
    //on verifie que l'id existe
    if(!empty($donnees->id)){
        if($produit->supprimer()){
            //ici la suppression a fonctionne
            // on envois un code reponse 200
            http_response_code(200);
            echo json_encode(["message" => "La suppression a été effectué"]);
        } else {
            //ici la creation n'a pas fonctionne
            // on envois un code reponse 503
            http_response_code(503);
            echo json_encode(["message" => "La suppression n'a pas été effectué"]);
        }
    }
}else {
    // on gere l'erreur
    // 405 le methode utilisée n'est pas la autorisée
    http_response_code(405);
    // on encode la reponse en json car c'est le format qu'on a definit dans le header, la reponse sera un tableau
    echo json_encode(["message" => "La methode n'est pas autorisée"]);
}

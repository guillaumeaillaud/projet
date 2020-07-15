<?php


// Headers requis
// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin: *");

// Format des données envoyées en json 
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée obligatoirement en POST pour une creation avec une API REST
header("Access-Control-Allow-Methods: PUT");

// Durée de vie de la requête
header("Access-Control-Max-Age: 3600");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $_SERVER sert a verifier si la methode de la requet utilisé par le post client est la bonne (PUT) on fait donc une condition
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

    // si la methode est la bonne on inclus tt les fichiers dont on a besoin pour la connexion a la bdd
    include_once "../config/Database.php";
    include_once "../models/Produits.php";

    // on instancie la base de données
    $database = new Database();
    // dans $db on a notre connexion
    $db = $database->getConnection();

    // on va initialiser un produit pour cela on instancie les produits
    $produit = new Produits($db);

    // on recup les infos envoyées dans $donnes qui est un objet qui va contenir les differentes infos du produit a creer
    // on fait un json_decode car on recup les données en json dans une entrée php
    // php://input est un fichier virtuel
    $donnees = json_decode(file_get_contents("php://input"));

    if (empty($donnees->id) && !empty($donnees->nom) && !empty($donnees->description)
        && !empty($donnees->prix) && !empty($donnees->categories_id)) {
        // ici on a recu les donnees
        // on hydrate notre objet
        //$produit est l'objet qu'on a instancié plus haut
        //pas besoin de les proteger car on les protegent deja ds le fichier produit
        $produit->id = $donnees->id;
        $produit->nom = $donnees->nom;
        $produit->description = $donnees->description;
        $produit->prix = $donnees->prix;
        $produit->categories_id = $donnees->categories_id;

        if ($produit->modifier()) {
            //ici la modification a fonctionne
            // on envois un code reponse 201 car c'est une methode POST et c'est un ajout
            http_response_code(200);
            echo json_encode(["message" => "la modification a été effectué"]);
        } else {
            //ici la creation n'a pas fonctionne
            // on envois un code reponse 503 car c'est une methode POST 
            http_response_code(503);
            echo json_encode(["message" => "la modification'a pas été effectué"]);
        }
    }
} else {
    // on gere l'erreur
    // 405 le methode utilisée n'est pas la autorisée
    http_response_code(405);
    // on encode la reponse en json car c'est le format qu'on a definit dans le header, la reponse sera un tableau
    echo json_encode(["message" => "La methode n'est pas autorisée"]);
}

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
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // si la methode est la bonne on inclus tt les fichiers dont on a besoin pour la connexion a la bdd
    include_once "../config/Database.php";
    include_once "../models/Produits.php";

    // on instancie la base de données
    $database = new Database();
    // dans $db on a notre connexion
    $db = $database->getConnection();

    // on va initialiser un produit pour cela on instancie les produits
    $produit = new Produits($db);
    // on recup les données avec la methode lire comme on a pas fait le fecth on appel sa un statement
    $stmt = $produit->lire();
    // var_dump($stmt);
    
    //on verifie si on a au moins un produit avec la methode native rowCount()
    if ($stmt->rowCount() > 0) {
        // on va initialiser un tableau asso
        $tableauProduits = [];
        // puis un sous ensemble produit
        $tableauProduits['produits'] = [];

        // on va parcourir les produits on faisant un fetch en meme temps
        // FETCH_ASSOC c'est pour dire qu'on veut tableau asso
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $prod = [
                "id" => $id,
                "nom" => $nom,
                "description" => $description,
                "prix" => $prix,
                "categories_id" => $categories_id,
                "categories_nom" => $categories_nom
            ];
            // avec les [] vide c'est comme si on faisait un push de $prod dans le tableauProduits
            $tableauProduits['produit'][] = $prod;
        }
        // on envois le code reponse 200 qui signifi OK
        http_response_code(200);

        // on encode en json est on envois
        echo json_encode($tableauProduits);
    }
} else {
    // on gere l'erreur
    // 405 le methode utilisée n'est pas la autorisée
    http_response_code(405);
    // on encode la reponse en json car c'est le format qu'on a definit dans le header, la reponse sera un tableau
    echo json_encode(["message" => "La methode n'est pas autorisée"]);
}

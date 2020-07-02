<?php

require_once "php/model/model.php";

// on fait une fonction pour preparer et et envoyer la requete 
function requeteSql($tab, $sql){
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $pdo = connexion()->prepare($sql);
    // on execute la requete
    $pdoStatment = $pdo->execute($tab);
    // et on retourne le resultat
    return $pdoStatment;
    
}

//READ
function read(){
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $bdd = connexion();
    //on fait la requete sql
    $sql = "SELECT * FROM `tache`";
    // on execute la requete
    $pdo = $bdd->prepare($sql);
    // on execute la requete
    $pdo->execute();
    // on stock les infos recuperer dans $resultat
    $resultat = $pdo->fetchAll(PDO::FETCH_ASSOC);
    // on retourne le resultat
    return $resultat;
}



// CREATE
$formulaire = $_POST["formulaire"]??"";

if ($formulaire == "create" && $formulaire !=="") {
    
    if (isset($_POST['titre']) && !empty($_POST['titre'])
    && isset($_POST['description']) && !empty($_POST['description'])
    && isset($_POST['statut']) && !empty($_POST['statut']) ) {

        $tab = [
                "titre" => $_REQUEST["titre"],
                "description" => $_REQUEST["description"],
                "statut" => $_REQUEST["statut"]
            ];

        $sql = "INSERT INTO `tache` (`titre`, `description`, `statut`) VALUES (:titre, :description, :statut)";

        requeteSql($tab, $sql);
    }
}




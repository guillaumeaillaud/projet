<?php

require_once "php/model/model.php";

// on fait une fonction pour preparer et et envoyer la requete 
function requeteSql($tab, $sql)
{
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $pdo = connexion()->prepare($sql);
    // on execute la requete
    $pdoStatment = $pdo->execute($tab);
    // et on retourne le resultat
    return $pdoStatment;
}

//READ
function read($table, $id)
{
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $bdd = connexion();
    //on fait la requete sql
    $sql = "SELECT * FROM $table WHERE id_u = ?";
    // on prepare la requete
    $pdo = $bdd->prepare($sql);
    // on execute la requete
    $pdo->execute(array($id));
    // on recupere les infos sous forme de tableau et on les stocks ds $resultat
    $resultat = $pdo->fetchAll();
    // on retourne le resultat
    return $resultat;
}


$formulaire = $_POST["formulaire"] ?? "";
// CREATE TACHE TODOLIST
if ($formulaire == "create" && $formulaire !== "") {

    if (
        isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['statut']) && !empty($_POST['statut'])
    ) {

        $tab = [
            "id_users" => $_SESSION['id'],
            "nom" => $_SESSION["nom"],
            "titre" => $_REQUEST["titre"],
            "description" => $_REQUEST["description"],
            "statut" => $_REQUEST["statut"]
        ];
        

        $sql = "INSERT INTO `taches` (`id_taches`, `id_u`, `nom`, `titre`, `description`, `statut`) VALUES (NULL, :id_users, :nom, :titre, :description, :statut);";

        requeteSql($tab, $sql);
    }
}


//UPDATE TACHE TODOLIST
if ($formulaire == "update" && $formulaire !== "") {

    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['titre']) && !empty($_POST['titre'])
        && isset($_POST['description']) && !empty($_POST['description'])
        && isset($_POST['statut']) && !empty($_POST['statut'])
    ) {

        $tab = [
            "id" => $_REQUEST["id"],
            "nom" => $_SESSION["nom"],
            "titre" => $_REQUEST["titre"],
            "description" => $_REQUEST["description"],
            "statut" => $_REQUEST["statut"]
        ];

        $sql = "UPDATE `taches` SET `nom` = :nom, `titre` = :titre, `description` = :description, `statut` = :statut WHERE id_taches = :id";

        requeteSql($tab, $sql);
    }
}


//DELETE TACHE TODOLIST
if ($formulaire == "delete" && $formulaire !== "") {

    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $tab = [
            "id" => $_REQUEST["id"],
        ];

        $sql = "DELETE FROM `taches` WHERE id_taches = :id";

        requeteSql($tab, $sql);
    }
}



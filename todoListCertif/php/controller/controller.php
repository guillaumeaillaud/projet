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
function read($table)
{
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $bdd = connexion();
    //on fait la requete sql
    $sql = "SELECT * FROM $table";
    // on prepare la requete
    $pdo = $bdd->prepare($sql);
    // on execute la requete
    $pdo->execute();
    // on recupere les infos sous forme de tableau et on les stocks ds $resultat
    $resultat = $pdo->fetchAll(PDO::FETCH_ASSOC);
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
            "titre" => $_REQUEST["titre"],
            "description" => $_REQUEST["description"],
            "statut" => $_REQUEST["statut"]
        ];

        $sql = "INSERT INTO `tache` (`titre`, `description`, `statut`) VALUES (:titre, :description, :statut)";

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
            "titre" => $_REQUEST["titre"],
            "description" => $_REQUEST["description"],
            "statut" => $_REQUEST["statut"]
        ];

        $sql = "UPDATE `tache` SET `titre` = :titre, `description` = :description, `statut` = :statut WHERE id = :id";

        requeteSql($tab, $sql);
    }
}


//DELETE TACHE TODOLIST
if ($formulaire == "delete" && $formulaire !== "") {

    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $tab = [
            "id_tache" => $_REQUEST["id"],
        ];

        $sql = "DELETE FROM `tache` WHERE id_tache = :id_tache";

        requeteSql($tab, $sql);
    }
}

// CREATE UTILISATEUR
if ($formulaire == "inscription" && $formulaire !== "") {

    if (
        isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['pwd']) && !empty($_POST['pwd'])) {

        //on appel la fonction read et je lui passe la table user en parametre
        $table = "users";
        $users = read($table);
        //je fais une boucle pour parcourir le tableau des données et selectionner la clé qui on le nom => nom
        foreach ($users as $user) {
            // je fais un extract ce qui va me fournir la variable $nom 
            extract($user);
        }
        if ($nom === $_POST["nom"]) {
            echo "Ce nom existe deja";
        } else {

            $tab = [
                "nom" => $_REQUEST["nom"],
                "pwd" => $_REQUEST["pwd"],
            ];

            $sql = "INSERT INTO `users` (`nom`, `pwd`) VALUES (:nom, :pwd)";

            requeteSql($tab, $sql);
            header("location:connection.php");
        }
    }
}

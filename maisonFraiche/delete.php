<?php
//on demarre une session pour utiliser la super globale $_SESSION qui peut etre lu ds un fichier et ds un autre 
// a condition qu'il y est session start au debut des fichiers qui l'utilisent
session_start();

// on utilise GET por recup l'id dans l'url et isset sert a savoir si id existe et !empty si il n'est pas vide dans l'url pas ds la base
if(isset($_GET['id']) && !empty($_GET['id'])){
    //il faut se connecter a la bdd pour savoir si l'id existe
    require_once('connect.php');

    //on nettoie l'id envoyé avec strip_tags qui nettoie l'id de toutes les balises
    $id = strip_tags($_GET['id']);

    //on refait un SELECT avant le DELETE car si id n'existe pas on va avoir une ereur
    $sql = 'SELECT * FROM `maisonFraiche` WHERE `id` = :id;';

    // on prepare la requete 
    $query = $db->prepare($sql);

    //on doit accrocher les parametre avec bindvalue
    // PDO:PARAM_INT sert a verifier que id est un entier
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // on execute la requete
    $query->execute();

    // on recupere le produit
    $produit = $query->fetch();

    // on verifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        // si ca ne fonctionne pas on renvois sur la page index
        header('location: index.php');
        die();
    }

    $sql = 'DELETE FROM `maisonFraiche` WHERE `id` = :id;';

    // on prepare la requete 
    $query = $db->prepare($sql);

    //on doit accrocher les parametre avec bindvalue
    // PDO:PARAM_INT sert a verifier que id est un entier
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // on execute la requete
    $query->execute();
    $_SESSION['message'] = "Produit supprimé";
    // si ca ne fonctionne pas on renvois sur la page index
    header('location: index.php');

}else{
    // comme j'ai demarré une session je peu utiliser la super globales $_SESSION
    $_SESSION['erreur'] = "URL invalide";
    // si ca ne fonctionne pas on renvois sur la page index
    header('location: index.php');
};

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
    }
}else{
    // comme j'ai demarré une session je peu utiliser la super globales $_SESSION
    $_SESSION['erreur'] = "URL invalide";
    // si ca ne fonctionne pas on renvois sur la page index
    header('location: index.php');
};
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Details client</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Details du client: <?= $produit['client'] ?></h1>
                <p>ID: <?= $produit['id'] ?></p>
                <p>Produit: <?= $produit['produit'] ?></p>
                <p>Prix: <?= $produit['prix'] ?></p>
                <p>Nombre: <?= $produit['nombre'] ?></p>
                <p><a href="index.php">Retour</a> / <a href="edit.php?id=<?=$produit['id'] ?>">Modifier</a></p>
            </section>
        </div>
    </main>
</body>
</html>
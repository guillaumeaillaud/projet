<?php

//on demarre la session
session_start();

if (isset($_POST)) {
    //on verifie si quand on post qql chose client est definie et n'est pas vide
    // et on verifie aussi le produit le prix et le nombre
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        &&isset($_POST['client']) && !empty($_POST['client'])
        && isset($_POST['produit']) && !empty($_POST['produit'])
        && isset($_POST['prix']) && !empty($_POST['prix'])
        && isset($_POST['nombre']) && !empty($_POST['nombre'])
    ) {

        // on va inclure la connection a la bdd
        require_once('connect.php');
        
        //on nettoie les donnés envoyé avec strip_tags 
        $id = strip_tags($_POST['id']);
        $client = strip_tags($_POST['client']);
        $produit = strip_tags($_POST['produit']);
        $prix = strip_tags($_POST['prix']);
        $nombre = strip_tags($_POST['nombre']);


        $sql = ' UPDATE `maisonFraiche` SET `client`=:client, `produit`=:produit,
         `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;';

        $query = $db->prepare($sql);

        //on doit accrocher les parametre avec bindvalue
        // PDO:PARAM_INT sert a verifier que id est un entier
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':client', $client, PDO::PARAM_STR);
        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);
        $query->bindValue(':nombre', $nombre, PDO::PARAM_STR);

        $query->execute();

        //on affiche un message de confirmation
        $_SESSION['message'] = "Produit modifié";

        // on arrete la connection a la bdd
        require_once('close.php');

        // puis on redirige vers index.php
        // attention header location marche que si on a pas mis de message avant (exemple pas de echo)
        header('location: index.php');
    }
} else {
    $_SESSION['erreur'] = 'le formulaire est incomplet';
}


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
    <title>Liste Clients / produits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                if (!empty($_SESSION['erreur'])) {
                    echo '<div class="alert alert-danger" role="alert">
                        ' . $_SESSION['erreur'] . '
                        </div>';
                    $_SESSION['erreur'] = '';
                }
                ?>
                <h1>Modifier un client</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" id="client" name="client" class="form-control" value="<?= $produit['client']?>">
                    </div>
                    <div class="form-group">
                        <label for="produi">Produit</label>
                        <input type="text" id="produit" name="produit" class="form-control" value="<?= $produit['produit']?>">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control" value="<?= $produit['prix']?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="number" id="nombre" name="nombre" class="form-control" value="<?= $produit['nombre']?>">
                    </div>
                    <input type="hidden" value="<?= $produit['id']?>" name="id">
                    <button class="btn btn-primary">Ajouter</button>
                </form>
            </section>
        </div>
    </main>
</body>

</html>
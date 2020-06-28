<?php

//on demarre la session
session_start();

if($_POST)
{
    //on verifie si quand on post qql chose client est definie et n'est pas vide
    // et on verifie aussi le produit le prix et le nombre
   if(isset($_POST['client']) && !empty($_POST['client'])
   && isset($_POST['produit']) && !empty($_POST['produit'])
   && isset($_POST['prix']) && !empty($_POST['prix'])
   && isset($_POST['nombre']) && !empty($_POST['nombre']))
   {
    // on va inclure la connection a la bdd
require_once('connect.php');

 //on nettoie les donnés envoyé avec strip_tags 
 $client = strip_tags($_POST['client']);
 $produit = strip_tags($_POST['produit']);
 $prix = strip_tags($_POST['prix']);
 $nombre = strip_tags($_POST['nombre']);

$sql = 'INSERT INTO `maisonFraiche` (`client`, `produit`, `prix`, `nombre`) VALUES(:client, :produit, prix, :nombre);';

$query = $db->prepare($sql);

//on doit accrocher les parametre avec bindvalue
// PDO:PARAM_INT sert a verifier que id est un entier
$query->bindValue(':client', $client, PDO::PARAM_STR);
$query->bindValue(':produit', $produit, PDO::PARAM_STR);
$query->bindValue(':prix', $prix, PDO::PARAM_STR);
$query->bindValue(':nombre', $nombre, PDO::PARAM_STR);

$query->execute();

//on affiche un message de confirmation
$_SESSION['message'] = "Produit ajouté";

// on arrete la connection a la bdd
require_once('close.php');

// puis on redirige vers index.php
// attention header location marche que si on a pas mis de message avant (exemple pas de echo)
header('location: index.php');

   }else{
    $_SESSION['erreur'] = 'le formulaire est incomplet';
   }
}

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
                <h1>Ajouter client</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" id="client" name="client" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="produi">Produit</label>
                        <input type="text" id="produit" name="produit" class="form-control">                    </div>
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="number" id="nombre" name="nombre" class="form-control">
                    </div>
                    <button class="btn btn-primary">Ajouter</button>
                </form>
            </section>
        </div>
    </main>
</body>

</html>
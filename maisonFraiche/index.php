<?php

//on demarre la session
session_start();

// on va inclure la connection a la bdd
require_once('connect.php');

$sql = 'SELECT * FROM `maisonFraiche`';

// on prepare la requete
$query = $db->prepare($sql);

// on execute la requete
$query->execute();

// on stock le resultat ds un tableau asso
// PDO::Fetch_ASSOC permet de dire qu'on veut les resultat qu'avec les titre des colonnes de la bdd (evitre les doublons)
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
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
                <?php
                if (!empty($_SESSION['message'])) {
                    echo '<div class="alert alert-success" role="alert">
                        ' . $_SESSION['message'] . '
                      </div>';
                    $_SESSION['message'] = '';
                }
                ?>
                <h1>Liste des Clients / Produits</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Nombre</th>
                        <th>actions</th>
                    </thead>
                    <tbody>
                        <?php
                        // on boucle sur la variable result qui contient un tableau qui contient des lignes
                        // et pour chaque ligne on a une ligne qui s'appelle produit
                        foreach ($result as $produit) {
                        ?>
                            <tr>
                                <!-- le : ?= est un raccourci en php pour faire un echo -->
                                <td><?= $produit['id'] ?></td>
                                <td><?= $produit['client'] ?></td>
                                <td><?= $produit['produit'] ?></td>
                                <td><?= $produit['prix'] ?></td>
                                <td><?= $produit['nombre'] ?></td>
                                <td><a href="details.php?id=<?= $produit['id'] ?>">Voir</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un client</a>
            </section>
        </div>
    </main>
</body>

</html>
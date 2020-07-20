<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@600&family=Permanent+Marker&family=Rajdhani:wght@500&display=swap" rel="stylesheet"> 
<body>
    <header class="container">
        <h1>TABLEAU GENERAL DES TACHES</h1>
        <hr>
        <nav>
            <div class="bouton">
                <button><a href="../../index.php">deconnection</a></button>
                <button><a href="pageTodo.php">retour</a></button>
            </div>
            <hr>
        </nav>
    </header>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        require("../model/model.php");

                        $bdd = connexion();

                        $sql = "SELECT * FROM `taches` ORDER BY `nom`";

                        $pdo = $bdd->prepare($sql);

                        $pdo->execute();

                        $resultats = $pdo->fetchAll();

                        foreach ($resultats as $resultat) {
                            extract($resultat);
                            echo "
                                <tr>
                                    <td>$nom</td>
                                    <td>$titre</td>
                                    <td>$description</td>
                                    <td class='$statut'>$statut</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>

</html>
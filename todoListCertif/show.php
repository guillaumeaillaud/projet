<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Tableau des utilisateurs avec leurs taches</h1>
        <nav>
            <a href="inscription.php">Inscription</a>
            <a href="connection.php">Connexion</a>
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
                        require("php/model/model.php");

                        $bdd = connexion();

                        $sql = "SELECT * FROM `taches` ORDER BY `nom`";

                        $pdo = $bdd->prepare($sql);

                        $pdo->execute();

                        $resultats = $pdo->fetchAll();

                        foreach ($resultats as $resultat) {
                            extract($resultat);
                            echo "
                                <tr class='$statut'>
                                    <br><td>$nom</td>
                                    <td>$titre</td>
                                    <td>$description</td>
                                    <td >$statut</td>
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
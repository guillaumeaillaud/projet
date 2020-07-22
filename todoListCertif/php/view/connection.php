<?php
session_start();

require('../model/model.php');

$db = connexion();
// CONNEXION
if (!empty($_POST['nom']) && !empty($_POST['pwd'])) {

    $nom = $_POST['nom'];
    $pwd = $_POST['pwd'];
    $req = $db->prepare('SELECT * FROM users WHERE nom = ? limit 1; ');
    $req->execute(array($nom));

    while ($user = $req->fetch()) {
        if (password_verify($pwd, $user['pwd'])) {
            header('location:pageTodo.php?success=1');
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['id'] = $user['id_users'];
            exit();
        } else {
            echo "<div class='container'><p class='alert alert-danger'>le nom ou le mot de passe est incorrect</p></div>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@600&family=Permanent+Marker&family=Rajdhani:wght@500&display=swap" rel="stylesheet"> </head>

<body>
    <header class="container">
        <h1>FORMULAIRE DE CONNEXION</h1>
        <hr>
    </header>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php if(isset($_GET['success'])){
                echo "<p class='alert alert-success'>félicitations "  .$_SESSION['nom'] ." vous etes inscrits<p>";
            } ?>
                <form class="form connexion" method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Entrez votre mot de passe">
                    </div>
                    <div>
                        <button>Connexion</button>
                        <button><a href="inscription.php">S'inscrire</a></button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
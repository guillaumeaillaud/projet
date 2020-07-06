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
        <h1>FORMULAIRE D'INSCRIPTION</h1>
    </header>
    <main class="container">
    <?php require_once "php/controller/controller.php"; ?>
        <div class="row">
            <section class="col-12">
                <form class="form inscription" method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="text" name="pwd" class="form-control" id="pwd" placeholder="Entrez votre mot de passe">
                    </div>
                    <div>
                        <input type="hidden" value="inscription" name="formulaire">
                        <button class="btn btn-primary">S'inscrire</button>
                        <a href="connection.php">Connexion</a>
                    </div>
                </form>
            </section>
        </div>

    </main>
    <footer>

    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire de connexion</title>
</head>

<body>
    <header>
        <h1>FORMULAIRE DE CONNEXION</h1>
    </header>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <form class="form connexion" method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="user" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                        <label for="motDePasse">Mot de passe</label>
                        <input type="text" name="motDePasse" class="form-control" id="motDePasse" placeholder="Entrez votre mot de passe">
                    </div>
                    <div>
                        <button class="btn btn-primary">Connexion</button>
                        <a href="inscription.php">S'inscrire</a>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>
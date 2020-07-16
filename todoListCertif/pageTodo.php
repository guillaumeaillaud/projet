<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Todo Liste</title>
</head>

<body>
    <header>
        <h1>Ma Todo Liste</h1>
        <nav>
       
        <a href="deconnection.php">Déconnexion</a>
        </nav>
    </header>

    <main class="container">

        <!--je recupere le fichier controller qui me permet de recuperer les infos du formulaire et de les envoyer a la bdd -->
        <?php require_once "php/controller/controller.php"; ?>

        <div class="row">
            <section class="col-12">
            <?php echo "<p class='alert alert-success'>Bonjour : " .$_SESSION['nom']."<p>";?>
                <h2>Formulaire de Création</h2>
                <!-- formulaire de creation d'une tache -->
                <form class="form create" method="post">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" class="form-control" id="titre" placeholder="Entrez le titre de la tache">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Entrez la description de la tache">
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="statut" value="todo">
                            <span>Todo</span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="statut" value="ongoing">
                            <span>Ongoing</span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="statut" value="done">
                            <span>Done</span>
                        </label>
                    </div>
                    <div>
                        <input type="hidden" name="formulaire" value="create">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </section>
        </div>

        <div class="row">
            <section class="col-12">
                    <!-- formulaire de modification d'une tache -->
                <form class="form update" method="post">
                <h2>Formulaire de Modification</h2>
                    <div>
                        <label for="id">id</label>
                        <input type="text" name="id" class="form-control" id="id">
                    </div>
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" class="form-control" id="titre" placeholder="Entrez le titre de la tache">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Entrez la description de la tache">
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="statut" value="todo">
                            <span>Todo</span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="statut" value="ongoing">
                            <span>Ongoing</span>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input type="radio" name="statut" value="done">
                            <span>Done</span>
                        </label>
                    </div>
                    <div>
                        <input type="hidden" name="formulaire" value="update">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </section>
        </div>

        <div class="row">
            <section class="col-12" id="supp">
                <h2>Formulaire pour Supprimer</h2>
                <!-- formulaire pour supprimer d'une tache -->
                <form class="form delete" method="post">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" name="id" class="form-control" id="id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="formulaire" class="form-control" value="delete">
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </div>
                    
                </form>
            </section>
            <div>
                <?php require_once "php/view/view.php"; ?>
            </div>
    </main>

    <footer>

    </footer>
    <script src="js/app.js"></script>
</body>

</html>
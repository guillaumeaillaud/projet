<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <h1>formulaire de creation de la todo liste</h1>

        <form id="create" action="" method="post">
            <label for="title">entrer votre titre</label>
            <input type="text" name="title" placeholder="entrer votre titre">
            <label for="description">entrer votre description</label>
            <input type="text" name="description" placeholder="entrer votre description">
            <input type="hidden" name="identificationFormulaire" value="create">
            <button type="submit">envoyer</button>
            <div class="confirmation">
                <?php
                $identificationformulaire = $_REQUEST["identificationFormulaire"] ?? "";
                if ($identificationformulaire == "create") {
                    require_once "controller.php";
                }
                ?>
            </div>
        </form>
    </section>
    <h2>votre todo</h2>
    <section id="read">
       

        <?php

                // on conecte php a sql
        $pdo = new PDO("mysql:host=localhost;dbname=todo_long;charset=utf8;", "root", "");

                // on construit la requete SQL READ

                $requeteSQL2 =

                <<<CODESQL
                SELECT * FROM `data_long`
                CODESQL;

                $pdoStatement = $pdo->query($requeteSQL2);

                $tabLigne = $pdoStatement->fetchAll();

                foreach ($tabLigne as $tabAsso) {
                    $id = $tabAsso['id'];
                    $title = $tabAsso["title"];
                    $description = $tabAsso["description"];

                    echo
                    <<<CODEHTML
                    <div class="articles">
                        <article>
                            <h2>$title</h2>
                            <p>$description</p>
                        </article>
                    </div>    
                    CODEHTML;
                }

        ?>

    </section>
</body>

</html>
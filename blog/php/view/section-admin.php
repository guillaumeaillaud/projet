<section>
    <h2>FORMULAIRE DE CREATION D'ARTICLES</h2>

    <form id="create" class="admin" action="" method="POST">
        <input type="text" name="titre" required placeholder="entrez le titre">
        <textarea name="contenu" cols="60" rows="8" required placeholder="entrez votre texte"></textarea>
        <input type="text" name="image" required value="assets/img/journaliste2.jpg">
        <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>">
        <input type="text" name="categorie" required placeholder="entrez la categorie">
        <input type="hidden" name="identificationFormulaire" value="create">
        <button type="submit">PUBLIER L'ARTICLE</button>
        <div class="confirmation">
            <?php
            $identificationFormulaire = $_REQUEST["identificationFormulaire"] ?? "";
            if ($identificationFormulaire == "create") {

                require "php/controller/form-articles.php";
            }
            ?>
        </div>
    </form>
</section>

<section class="updateSection cache">
    <button class="closePopup">fermer la popup</button>
    <h2>FORMULAIRE POUR MODIFIER UN ARTICLE (UPDATE)</h2>
    <form id="update" class="admin" action="" method="POST">
        <div class="infoUpdate">
            <input type="text" name="titre" required placeholder="entrer le titre">
            <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu"> </textarea>
            <input type="text" name="image" required value="assets/img/journaliste2.jpg">
            <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?> ">
            <input type="text" name="categorie" required placeholder="entrer la categorie">
            <!-- POUR LE UPDATE ON DOIT SAVOIR QUELLE LIGNE ON VEUT MODIFIER -->
            <input type="text" name="id" required placeholder="entrer id ligne">
        </div>
        <!-- PARTIE TECHNIQUE POUR SAVOIR QUEL EST LE FORMULAIRE A TRAITER POUR LE SERVEUR -->
            <input type="hidden" name="identificationFormulaire" value="update">
            <button type="submit">MODIFIER L'ARTICLE</button>
            <div class="confirmation">
                <?php
                $identificationFormulaire = $_REQUEST["identificationFormulaire"] ?? "";
                if ($identificationFormulaire =="update"){
                    require "php/controller/form-articles.php";
                }
                ?>
            </div>
    </form>
</section>

<section class="cache">
    <h2>FORMULAIRE DE DELETE</h2>
    <form id="delete" action="" method="POST">
        <input type="text" name="id" required placeholder="entrer id">
        <!-- CODE BARRE TECHNIQUE POUR DISTINGUER LES FORMULAIRES -->
        <input type="hidden" name="identificationFormulaire" value="delete">
        <button>SUPPRIMER LA LIGNE</button>
        <div class="confirmation">
            <?php
            $identificationFormulaire = $_REQUEST["identification formulaire"] ?? "";
            if ($identificationFormulaire == "delete"){
                require "php/controller/form-articles.php";
            }
            ?>
        </div>

    </form>

</section>

<section>
    <h2>LISTES DES ARTICLES</h2>

    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>titre</td>
                <td>contenu</td>
                <td>image</td>
                <td>categorie</td>
                <td>modifier</td>
                <td>supprimer</td>
            </tr>
        </thead>
        <body>

            <?php

$requeteSQL =
<<<CODESQL

SELECT * FROM 'infos'
ORDER BY datepublication DESC

CODESQL;

$tabAssoColonneValeur = [];

// je charge le code php pour envoyer la requete
require"php/model/envoyer-sql.php";

// etape3 je recupere mon tableau de resultats
// https://www.php.net/manual/fr/pdostatement.fetchall.php
$tabLigne = $pdoStatement->fecthall();



            ?>
        </body>
    </table>
</section>
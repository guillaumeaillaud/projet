<section>
    <h2>FORMULAIRE DE CREATION D'ARTICLES</h2>

    <form class="tableau" action="" method="POST">
    <input type="text" name="titre" required placeholder="entrez le titre">
    <textarea name="contenu" cols="60" rows="8" required placeholder="entrez votre texte"></textarea>
    <input type="text" name="image" required value="assets/img/journaliste2.jpg">
    <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s")?>">
    <input type="text" name="categorie" required placeholder="entrez la categorie">
    <button type="submit">PUBLIER L'ARTICLE</button>
    <div class="confirmation">
        <?php require_once"php/controller/form-articles.php" ?>
    </div>
    </form>

<?php require_once"modif-articles.php" ?>








</section>
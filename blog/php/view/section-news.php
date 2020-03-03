<h2>NEWS</h2>
<div class="image">
<?php

$pdo = new PDO("mysql:host=localhost;dbname=articles;charset=utf8;", "root", "");

$requeteSql =
    <<<CODESQL

            SELECT * FROM `infos`
            ORDER BY datePublication DESC


            CODESQL;

$pdoStatement = $pdo->query($requeteSql);

$tabLigne = $pdoStatement->fetchAll();

foreach ($tabLigne as $tabAsso) {
    $id             = $tabAsso["id"];
    $titre          = $tabAsso["titre"];
    $contenu        = $tabAsso["contenu"];
    $image          = $tabAsso["image"];
    $categorie      = $tabAsso["categorie"];

    echo
<<<CODEHTML
            <article class="$categorie">
                <img src="$image" alt="photo1">
                <h3>$titre</h3>
                <p>$contenu</p>
            </article>
CODEHTML;
}

?>
</div>

<section>
    <div class="image">

        <img src="assets/img/newsBlog.jpg" alt="photonews">

        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dignissimos ratione praesentium quaerat corrupti non reprehenderit consectetur perspiciatis sapiente necessitatibus? Voluptatibus, officiis hic quae ad doloremque quo dignissimos vitae laudantium voluptate.</p>

        <article>
            <img src="assets/img/journaliste1.jpg" alt="journaliste">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cumque cupiditate repellendus dolorum vitae impedit temporibus non et, eligendi repudiandae? Eveniet praesentium, porro quasi nobis quos est doloremque possimus? Quae.</p>
        </article>
        <article>
            <img src="assets/img/journaliste2.jpg" alt="journaliste">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cumque cupiditate repellendus dolorum vitae impedit temporibus non et, eligendi repudiandae? Eveniet praesentium, porro quasi nobis quos est doloremque possimus? Quae.</p>
        </article>
        <article>
            <img src="assets/img/journaliste3.jpg" alt="journaliste">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cumque cupiditate repellendus dolorum vitae impedit temporibus non et, eligendi repudiandae? Eveniet praesentium, porro quasi nobis quos est doloremque possimus? Quae.</p>
        </article>
        <article>
            <img src="assets/img/journaliste4.jpg" alt="journaliste">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cumque cupiditate repellendus dolorum vitae impedit temporibus non et, eligendi repudiandae? Eveniet praesentium, porro quasi nobis quos est doloremque possimus? Quae.</p>
        </article>
        <article>
            <img src="assets/img/journaliste5.jpg" alt="journaliste">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cumque cupiditate repellendus dolorum vitae impedit temporibus non et, eligendi repudiandae? Eveniet praesentium, porro quasi nobis quos est doloremque possimus? Quae.</p>
        </article>
        <article>
            <img src="assets/img/journaliste6.jpg" alt="journaliste">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti cumque cupiditate repellendus dolorum vitae impedit temporibus non et, eligendi repudiandae? Eveniet praesentium, porro quasi nobis quos est doloremque possimus? Quae.</p>
        </article>




    </div>

</section>






</main>
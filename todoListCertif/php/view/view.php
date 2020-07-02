<?php

require_once "php/controller/controller.php";

// on stock les données de la bdd qu'on recupere sous la forme d'un tableau asso grace a la requete read
$tableau = read();

echo '
    <table class="table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Statut</th>
            <th>Modifier</th>
            <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
    ';

foreach ($tableau as $tab) {
    //on recupere les valeurs du tableau dans des variables du meme nom
    extract($tab);
    // on affiche les valeurs
    echo "
            
            <tr>
                <td>$id</td>
                <td>$titre</td>
                <td>$description</td>
                <td>$statut</td>
                <td><button type='button' class='btn btn-success'>modifier</button></td>
                <td><button type='button' class='btn btn-danger'>supprimer</button></td>
            </tr>
        </tbody>
        ";
}

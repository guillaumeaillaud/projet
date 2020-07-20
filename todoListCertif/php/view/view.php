<?php

require_once "../controller/controller.php";

// on stock les données de la bdd qu'on recupere sous la forme d'un tableau asso grace a la fonction read
$table = "taches";


$id = $_SESSION['id'];
$tableau = read($table, $id);

//on fait un echo pour afficher les resultats
echo '

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
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
                <td>$nom</td>
                <td>$titre</td>
                <td>$description</td>
                <td  class='$statut'>$statut</td>
                <td><button type='button' class='btn btn-success modifier' id='$id_taches' nom='$nom' titre='$titre' desc='$description' statut='$statut' >modifier</button></td>
                <td><button type='button' class='btn btn-danger supprimer' id=$id_taches>supprimer</button></td>
            </tr>
        </tbody>
        ";
}

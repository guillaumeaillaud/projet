<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>COUR PHP POO</h1>
    

   <!-- <form action="cours.php" method="POST">
        <label for="nom">Nom d'utilisateur</label>
        <input type="text" name="nom" id="nom"><br>
        <label for="pass">choisissez un mot de passe</label>
        <input type="text" name="pass" id="pass"><br>
        <input type="submit" value="Envoyer">
    </form>
-->
<?php

    require 'utilisateur.classe.php';
    require 'admin.classe.php';
    // + verification des données recues (regex + filtres)
    // + stockage des données dans une bdd

   // $pierre = new Utilisateur($_POST['nom'], $_POST['pass']);
   // echo $pierre->getNom().'<br>';

    $pierre = new Admin('pierre', 'abcdef', 'sud');
    $mathilde = new Admin('math', 123456, 'nord');
    $florian = new Utilisateur('flo', 'flotri', 'est');

    $pierre->setPrixAbo();
    $mathilde->setPrixAbo();
    $florian->setPrixAbo();

    $u = 'Utilisateur';
    echo 'valeur de ABONNEMENT dans Utilisateur : '.$u::ABONNEMENT.'<br>';
    echo 'valeur de ABONNEMENT dans Admin : '.Admin::ABONNEMENT.'<br>';

    echo 'prix de l\'abonnement pour : ';
    $pierre->getNom();
    echo ' : ';
    $pierre->getPrixAbo();
    echo '<br>';

    echo 'prix de l\'abonnement pour : ';
    $mathilde->getNom();
    echo ' : ';
    $mathilde->getPrixAbo();
    echo '<br>';

    echo 'prix de l\'abonnement pour : ';
    $florian->getNom();
    echo ' : ';
    $florian->getPrixAbo();
    echo '<br>';


    /*

    $pierre->setBan('paul');
    $pierre->setBan('jean');
    $pierre->setBan('pat');

    echo $pierre->getBan();


        require "utilisateur.classe.php";

        $pierre =  new Utilisateur('pierre', 'abcdef');
        $mathilde = new Utilisateur('math', 123456);

        //$pierre->user_name = "pierre";
        //$pierre->user_pass = "abcdef";
        //$mathilde->user_name = "math";
        //$mathilde->user_pass = "123456";

        $pierre->setNom("pierre");
        $pierre->setPasse("abcdef");

        $mathilde->setNom("math");
        $mathilde->setPasse("123456");
        echo $pierre->getNom()."</br>";
        echo $mathilde->getNom()."</br>";
        */

        ?>

        
    
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, quae voluptates? Maiores molestiae cum consequatur est itaque delectus voluptates praesentium beatae pariatur vero possimus, quis esse eos totam nemo nam?</p>
</body>
</html>
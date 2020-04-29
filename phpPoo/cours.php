<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>COUR PHP POO</h1>
    <?php
        require "utilisateur.classe.php";

        $pierre =  new Utilisateur();
        $mathilde = new Utilisateur();

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
    ?>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, quae voluptates? Maiores molestiae cum consequatur est itaque delectus voluptates praesentium beatae pariatur vero possimus, quis esse eos totam nemo nam?</p>
</body>
</html>
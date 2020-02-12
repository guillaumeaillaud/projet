<?php
$infos = count ($_REQUEST);
if ($infos > 0)
{
    $nom        = $_REQUEST["nom"];
    $email      = $_REQUEST["email"];
    $message    = $_REQUEST["message"];

    $messageEnregistre =
    <<<texte
    nom: $nom
    email: $email
    message: $message

    texte;

        file_put_contents("php/model/contact.txt", $messageEnregistre, FILE_APPEND);
    echo "merci pour votre message $nom . Nous vous recontacterons";
}



?>
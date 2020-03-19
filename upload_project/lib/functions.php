<?php

require_once "config.php";

function getConnection()
{

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        // on essaye d'executer le code dans la partie try
        $bd = new PDO(DSN, USERNAME, PWD, $options);
        echo "Succesfully connected to BD";
    } catch (PDOException $error) {
        // si erreur on gere l'erreur
        echo "failed to connect to BD with error : {$error->getMessage()}";
    }


    return $bd;
}

//TODO: créer une fonction qui prendra en parametre une requete et qui traitera les données du formulaire

function handleRequest($information)
{


    if (isset($information["fileUpload"])) {
        // on utilise extract pour se faciliter la vie et extraire les valeurs d'un tableau associatif dans des variables dont le nom correspond aux clé du tableau
        extract($information["fileUpload"]);

        // vérifier si pas d'erreur lors de l'upload
        if ($error === UPLOAD_ERR_OK) {

            //on utilise une expression reguliere pour trouver les espaces dans une chaine de caractere
            $pattern = "/\s/";
            //on utilise preg_replace pour les remplacer
            $name = preg_replace($pattern, "-", $name);

            // on va générer un identifiant unique pour le fichier qu'on va sauvegarder
            $fileName = uniqid() . "-" . $name;

            //on spécifie a quel endroit on va sauvegarder nos images sur le serveur
            $uploadsDir = "uploads/";

            $path =  $uploadsDir . $fileName;

            //sauvegarder l'image
            //on va utiliser une fonction php : move_uploaded_file()
            //cette fonction renvoie true si tout s'est bien passé

            // 1er paramètre : chemin vers le stockage temporaire de l'image
            // 2ème paramètre : chemin complet vers le lieu de stockage sur le serveur
            if (move_uploaded_file($tmp_name, $path)) {
                echo "le fichier {$fileName} a bien été sauvegardé";

                // ici on va sauvegarder l'image en BDD
                // étapes :

                // se connecter à la BDD
                $pdo = getConnection();
                // écrire sa requête SQL
                $sql = "INSERT INTO images (name, path) VALUES (:name, :path)";
                // prépare la requête
                $pdoStatement = $pdo->prepare($sql);
                // exécuter la reqûete en associant les bonnes valeurs
                $file = [
                    ":name" => $name,
                    ":path" => $path,
                ];

                $pdoStatement->execute($file);
                // on confirme par un message a l'utilisateur avec un lie vers l'image du serveur
                echo "Le fichier a été sauvegardé dans la BDD. Il est visible <a href={$path} >ici</a>";
            } else {
                echo "erreur lors de la sauvegarde";
            }
        }
    }
}

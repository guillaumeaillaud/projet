<?php


// ATTENTION: CES METHODES SONT PUBLIQUES
// ELLES PEUVENT ETRE ACTIVEES DEPUIS l'EXTERIEUR... 
// DANGER POTENTIEL... BIEN SECURISER CETTE PARTIE...
class ApiUser
{
    // PROPRIETE COLLECTIVE
    static $confirmation = "";

    // METHODES
    static function login ()
    {
        // LES INFOS DE FORMULAIRES SONT RECUPEREES DANS $_REQUEST
        $emailForm      = $_REQUEST["email"] ?? "";
        $passwordForm   = $_REQUEST["password"] ?? "";

        $tabResult = Model::read("user", "email", $emailForm);

        // DEV
        // NORMALEMENT DANS LE CREATE (INSCRIPTION D'UN NOUVEL UTILISATEUR...)
        $passwordHash = password_hash($passwordForm, PASSWORD_DEFAULT);

        foreach($tabResult as $tabLigne)
        {
            extract($tabLigne);
        }
        // => CREE UNE VARIABLE PAR COLONNE $id, $login, $password, $level
        // ATTENTION, ON A DEJA $password

        if (!empty($tabLigne))  // ON A TROUVE UNE LIGNE
        {
            // https://www.php.net/manual/fr/function.password-verify.php
            if (password_verify($passwordForm, $password))
            {
                // OK
                // AJOUTER ICI LE CODE QUI GERE LE LOGIN...
                ApiUser::$confirmation = "BIENVENUE $login, VOUS AVEZ LE LEVEL $level";

                // POUR COMPLETER
                // ON DOIT RENVOYER AU NAVIGATEUR UN BADGE D'ACCES
                // => TOKEN D'IDENTIFICATION
                // ET ENSUITE LE VISITEUR POURRA UTILISER CE BADGE DANS LA PARTIE ADMIN...
                // (LA PARTIE ADMIN POURRA VERIFIER SI LE BADGE EST VALIDE...)

            }
            else
            {
                // KO
                // AJOUTER ICI LE CODE QUI GERE LE LOGIN...
                ApiUser::$confirmation = "DESOLE, LE MOT DE PASSE EST INCORRECT ($passwordHash)";
            }
        }
        else
        {
            // KO email NON TROUVE
            ApiUser::$confirmation = "DESOLE, L'EMAIL EST INCORRECT ($passwordHash)";
        }

    }

}
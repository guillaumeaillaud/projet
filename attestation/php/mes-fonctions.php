<?php


// ON PEUT CREER DES FONCTIONS POUR NOUS FACILITER LE CODE
// AVANTAGE1: NE PAS DUPLIQUER DES BLOCS DE CODE IDENTIQUES
// AVANTAGE2: AJOUTER DU CODE DE SECURITE POUR FILTRER CHAQUE INFO EXTERIEURE
function filtrer($name)
{
    // SECURITE: ?? "" => SI LE NAVIGATEUR N'ENVOIE PAS L'INFO, ON PREND COMME VALEUR PAR DEFAUT ""
    $infos = $_REQUEST[$name] ?? "";
    // ON POURRA RAJOUTER PLUS DE SECURITE...

    return $infos;
}

// ETAPE 1: DECLARATION DE LA FONCTION
// => CODE EN ATTENTE
// ICI $tabAssoColonneValeur EST UN PARAMETRE DE LA FONCTION
// => VARIABLE LOCALE A LA FONCTION
function insererLigneSQL($nomTable, $tabAsso)
{
    // MAINTENANT JE PEUX CONSTRUIRE LA REQUETE SQL PREPAREE
    $requeteSQL =
        <<<CODESQL

INSERT INTO $nomTable
(nom, prenom, adresse, raison, numero, dateDeclaration)
VALUES
(:nom, :prenom, :adresse, :raison, :numero, :dateDeclaration)

CODESQL;
    // ENSUITE, ON VA ENVOYER LA REQUETE SQL PREPAREE
    // CONNECTER A SQL

    // ETAPE1: CONNECTER PHP A SQL
    $pdo = new PDO("mysql:host=localhost;dbname=attestation;charset=utf8;", "root", "");

    // ETAPE2a: ON ENVOIE LA REQUETE PREPAREE
    // PDOStatement EST UN CONTAINER QUI ENGLOBE LES RESULTATS DE LA REQUETE SQL
    $pdoStatement = $pdo->prepare($requeteSQL);

    // ETAPE2b: ON FOURNIT LES DONNEES EXTERIEURES A PART
    $pdoStatement->execute($tabAsso);

    // POUR DEBUG SQL SI BESOIN
    // https://www.php.net/manual/fr/pdostatement.debugdumpparams.php
    $pdoStatement->debugDumpParams();
}

<?php

// partie DSN : driver, host, nom bdd, encodage caracteres
const DSN = "mysql:host=localhost;dbname=todolist;charset=utf8";

// nom user mysql
const USERNAME = "root";

// mdp user sql
const PWD ="" ;

// options PDO
const OPTIONS = [
    // on defini l'option d'affichage des resultats PDO sous la forme de tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // on specifie qu'on veut recuperer les exeptions eventuelles
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
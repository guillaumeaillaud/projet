<?php

class App 
{
    // methodes static (collectif)
    static function start()
    {
        //installer le chargement auto de classe
        spl_autoload_register("App::chargerCodeClass");

       
        
    }

    //php va appeler cette methode quand php aura besoin d'une classe et php fournira le parametre
    static function chargerCodeClass ($className)
    {
        echo "php a besoin de $className";

        // il faut ajouter le code qui charge le fichier 
        // qui contient la definition de la classe
        require_once "php/class/$className.php";
    }
}

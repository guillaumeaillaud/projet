<?php

// si on veut faire de la poo il faut rajouter un autoload de classe pour charger automatiquement les classes
// on va ranger toutes nos classes dans le dossier php/class (la premiere classe est souvent nappele App)

// pour commencer on charge a la main avec require_once
require_once "php/class/App.php";

// maintenant on peut faire de la POO
// le plus simple est de faire de la programmation par classe

App::start();


$Test = new Test;

<?php

/*boucle while 

$nombre = 1;
$phrase = " je me repete";

while($nombre <= 100){

    echo $nombre . "=". $phrase ."</br>";
    $nombre = $nombre + 1;
}



boucle for 

$phrase = " je me repete";

for ($i=0; $i <124 ; $i++) { 
    echo $i ."+" . $phrase ."</br>";
};

*/

/*boucle foreach 

$tab = ["valeur1", "valeur2","valeur3","valeur4"];

foreach ($tab as $valeur) {
    echo $valeur."</br>";
}



$array = [
    "guigui " => 35,
    "patrick "=> 42,
    "julien " => 30,
    "dja "=> 22,
    "boule " => 46,
    "manon "=> 49
];

foreach ($array as $key => $value) {
    if($value < 40){
       echo $key."c'est bon!!!vous avez le bon age "."</br>";
        
    }else{
        echo $key."vous n'avez pas l'age "."</br>";
    }
   
};



// tableau associatif

$tabAsso = [

"nom" => "Aillaud",
"prenom" => "Guillaume",
"age" => "34",
"adresse" => "6 rue du rouet"
];

$age = $tabAsso["age"];
$adresse = $tabAsso["adresse"];

//echo $adresse;

$tabAsso["ville"] = "marseille";

//print_r ($tabAsso);

foreach($tabAsso as $valeur)
{
    echo $valeur."-"."</br>";
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>FORMULAIRE</h1>
        <section>
            <form action="" method="post">
                <input type="text" name="name" placeholder="entrez votre nom">
                <input type="text" name="prenom" placeholder="entrez votre prenom">
                <input type="message" name="name" placeholder="entrez votre message">
                <button>envoyer</button>
            </form>
        </section>
</body>

</html>


//$maVariable = "un coup";

// doubles quotes
//echo "je vais aller boire $maVariable";

//simple quotes
//echo 'je vais aller boire '.$maVariable;


$tabAsso = [

    "nom" => "Aillaud",
    "prenom" => "Guillaume",
    "age" => "34",
    "adresse" => "6 rue du rouet"
    ];

    // PREMIERE METHODE
    // variable faisant reference a un element de tableau doit etre entre {}
    //echo "le nom de l'utilisateur est {$tabAsso['nom']}";

    
    //deuxieme methode
    //$nom = $tabAsso["nom"];
    // echo "le nom de l'utilisateur est $nom";

    */

    

    //LES FONCTIONS

    /* FONCTIONS SANS PARAMETRE

    function greet(){
        echo "hello world";
    };

    greet();

    

    //FONCTIONS AVEC PARAMETRES

    function greet($nom = "pat"){
        echo "hello $nom";

    };

    greet("john");


function compter($nbr1,$nbr2){
    $resultat = $nbr1 + $nbr2;
    //echo $resultat;
    if($resultat <= 11){
        return "tu es en dessous de 11 car $resultat est plus petit que 11";
    }else{
        return $resultat." est plus grand que 11";
    }
    

};

 echo (compter(23,5));
 */

 class User {
     static $nbPied = 2;

     static function getNbpied()
     {
        return User::$nbPied;
     }



     public $login = "";

     function getLogin()
     {
         var_dump($this);
         return $this->login;
     }
 }

 echo "<h3>PAR CLASSE STATIC</h3>";

 echo User::getNbPied();


 echo "<h3>PAR OBJET</h3>";

 $user = new User;
 $user->login = "login13";
 

 $user2 = new User;
 $user2->login = "marseille13";


echo "<h3>premier user</h3>";
 $user->getLogin();

echo "<h3>deuxieme user</h3>";
 $user2->getLogin();
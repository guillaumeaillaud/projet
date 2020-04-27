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

*/

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

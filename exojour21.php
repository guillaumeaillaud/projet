


<?php

/* caluler le nombre de chiffre paire ds un tableau

function paire($tableauPair)
{

    $pair = 0;

    for ($i = 0; $i < count($tableauPair); $i++) {

        if ($tableauPair[$i] % 2 == 0) {

            $pair = $pair + 1;
        }
    }

    return $pair;
}

$tableauPair = [1, 5, 4, 10];
echo paire($tableauPair);

*/
/*  calcul de nombre impairs dans un tableau*/






function somme($tableau){

    $sommeTotal= 0;

    for ($i=0; $i < count($tableau); $i++) { 
        
        $sommeTotal = $sommeTotal + $tableau[$i];
       
    }

    return $sommeTotal;


}
 

$tableau = [3, 5, 10, 7];

echo somme($tableau)








?>
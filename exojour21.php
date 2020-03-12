


<?php

/* caluler le nombre de chiffre paire ds un tableau*/

function paire($tableauPair)
{

    $pair = 0;

    for ($i = 0; $i < count($tableauPair); $i++) {

        if ($tableauPair[$i] % 2 == 0) {

            $pair =$pair+ 1;
        }
    }

    return $pair;
}

$tableauPair = [1, 5, 4, 10];
echo paire($tableauPair);

?>
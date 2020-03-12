
<?php
/* calculer la somme dans un tableau*/

function sommeTab($tableau)
{
    $somme = $tableau[0];

    for ($i = 1; $i < count($tableau); $i++) {

        $somme += $tableau[$i];
    }
    return $somme;
}

$tableau = [3, 2, 6, 89];

echo sommeTab($tableau);

?>
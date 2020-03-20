<?php

$nomTable = "contact";
$id= 5;

function creerdeleteSQl($nomTable,$id){

   
$resultat =  " delete from ". $nomTable ." where id= " .$id;

return $resultat;

}

echo creerdeleteSQl($nomTable,$id);








?>





<?php

require_once "php/model/glossaire.php";

//print_r($glossaire);

function displayRandomTerm($array)
{
    $length = count($array);
   // var_dump($length);
   $index = mt_rand(0,$length -1);
  // var_dump($index);

    echo'<pre>';
print_r($array[$index]['title']);
    echo'<br>';
print_r($array[$index]['descritpion']);
    echo'</pre>';
}


displayRandomTerm($glossaire);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glossaire des termes OPQUAST</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
</body>
</html>


htm
</html>
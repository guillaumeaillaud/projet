
<link rel='stylesheet' type='text/css' href='simplon/projet/exo.php/style.php' />
<?php
 header("Content-type: text/css; charset: UTF-8");

try {

    $pdo = new PDO('mysql:host=localhost');
    echo '<h1>Sucessfully connected to database</h1>';
} catch (PDOException $error) {
    echo 'Failed connecting to database: '.$error->getMessage();
}


?>
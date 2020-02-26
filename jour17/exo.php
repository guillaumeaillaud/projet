<?php

try {

    $pdo = new PDO('mysql:host=localhost');
    echo 'Sucessfully connected to database';
} catch (PDOException $error) {
    echo 'Failed connecting to database: '.$error->getMessage();
}
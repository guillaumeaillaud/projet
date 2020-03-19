<?php

require_once "lib/functions.php";

$pdo = getConnection();

//superglobales php
//$_GET
//$_POST
//$_REQUEST => $_GET, $_POST, $_COOKIE
//$_SERVER
//$_SERVER
//$_FILES

handleRequest($_FILES);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload project</title>
</head>

<body>
    <h1>FILE UPLOAD</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="file-upload"></label>
        <input type="file" name="fileUpload" id="file-upload">
        <button type="submit" name="submit">Save</button>
    </form>
</body>

</html>
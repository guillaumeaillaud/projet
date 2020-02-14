<?php

    if (!empty($_REQUEST)) {
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['password'];
        $cfm_pwd = $_REQUEST['confirm_pwd'];

        // echo '<pre>';
        // print_r($_REQUEST);
        // echo '</pre>';

        // nettoyage des inputs
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <form action="" method="post">
        <label for="user-name">User name</label>
        <input type="text" name="username" id="user-name">
        <label for="user-email">Email</label>
        <input type="email" name="email" id="user-email">
        <label for="user-password">Password</label>
        <input type="password" name="password" id="user-password">
        <label for="user_-confirm">Confirm password</label>
        <input type="password" name="confirm_pwd" id="user-confirm">
        <input type="submit" value="Log in">
    </form>
</body>
</html>
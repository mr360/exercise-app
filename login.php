<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Exercise app" />
    <title>Exercise app</title>
    <link rel="icon" type="image/png" href="images/favicon.svg" />
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
<?php include 'header.php'; ?>

<form id="login" action="confirm-login.php" method="post">
    <fieldset>
        <legend>
            Sign in
        </legend>
        <p>
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
            <br />
            <br />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
        </p>
    </fieldset>
    <input type="submit" value="Log in" />
</form>
</body>
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

<form id="newuser" action="create-user.php" method="post">
    <fieldset>
        <legend>
            Sign in
        </legend>
        <p>
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
            <br />
            <br />
            <label for="email">Email</label>
            <input type="text" name="email" id="email" size="20" required="required" pattern="[a-zA-Z\d.@]{1,50}" />
            <br />
            <br />
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" size="20" required="required" pattern="[a-zA-Z]{1,50}" />
            <br />
            <br />
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" size="20" required="required" pattern="[a-zA-Z]{1,50}" />
            <br />
            <br />
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" size="20" required="required" pattern="[\d]{8,16}" />
            <br />
            <br />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
            <br />
            <br />
            <label for="passwordconf">Confirm Password</label>
            <input type="password" name="passwordconf" id="passwordconf" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
        </p>
    </fieldset>
    <input type="submit" value="Create Account" />
</form>
</body>
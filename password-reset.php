<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Exercise app" />
    <title>Exercise app</title>
    <link rel="icon" type="image/png" href="images/favicon.svg" />
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/reset-pass-fill.js"></script>
</head>

<body>
<?php include 'header.php'; ?>

<form id="reset-pass" action="confirm-reset.php" method="post">
    <fieldset>
        <legend>
            Reset Password
        </legend>
        <p>
            <input type="hidden" name="username" id="username" />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
            <br />
            <br />
            <label for="confpassword">Confirm password</label>
            <input type="password" name="confpassword" id="confpassword" size="20" required="required" pattern="[a-zA-Z\d]{1,50}" />
        </p>
    </fieldset>
    <input type="submit" value="Reset password" />
</form>
</body>
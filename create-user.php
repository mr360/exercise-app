<?php

// Need to create multiple versions for this. The email formatting will require a new version, that accepts '@' and '.'.
function sanitise($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function redir($time, $location)
{
    sleep($time);
    header("location:$location");
}

function passstrengthcheck($password, &$strong)
{
    $strong = true;
    if (strlen($password)<8){
        $strong = false;
    }
    if (!preg_match("#[0-9]+#", $password)){
        $strong = false;
    }
    if (!preg_match("#[a-z]+#", $password)){
        $strong = false;
    }
    if (!preg_match("#[A-Z]+#", $password)){
        $strong = false;
    }
    if (preg_match("#[ ]+#", $password)){
        $strong = false;
    }
}

function createacc($username, $password, $passwordconf, $email, $firstname, $lastname)
{
    passstrengthcheck($password, $strong);
    if ($passwordconf == $password && $strong){
        $hash = hash('sha512', $password);
        $query = "insert into users (username, password, firstname, lastname, email, phone) values ('$username', '$hash', '$firstname', '$lastname', '$email', '$phone')";
        require_once("settings.php");
        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p>Failed to connect. Please try again.</p>";
            redir(5, "new-user.php");
        } else {
            setcookie("User", $username);
            echo "<p>Welcome to Exercise App, $username.</p>";
            redir(5, "index.php");
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    } else {
        echo "<p>Failed to create account. Please ensure passwords match, and are strong enough.</p>";
        redir(5, "new-user.php");
    }
}



$username = sanitise($_POST["username"]);
$email = sanitise($_POST["email"]);
$firstname = sanitise($_POST["firstname"]);
$lastname = sanitise($_POST["lastname"]);
$password = sanitise($_POST["password"]);
$passwordconf = sanitise($_POST["passwordconf"]);
$phone = sanitise($_POST["phone"]);

createacc($username, $password, $passwordconf, $email, $firstname, $lastname, $phone);


?>
<?php

// Note: Function is expected to trim anything that isn't alphanumeric.
// Keep it simple. Does limit passwords, but security isn't the most important thing at the moment.
// Can be changed if we switch the DB to using some form of hashing for passwords.
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

function runquery($query)
{
    require_once("settings.php");
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<p>Failed to reset password. Please try again.</p>";
        redir(5, "password-reset.php");
    } else {
        echo "<p>Success.</p>";
        redir(5, "login.php");
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}

function resetpass($username, $password, $confpassword)
{
    if ($password == $confpassword)
    {
        $hash = hash('sha512', $password);
        $query = "update users set password = '$hash' where username = '$username'";
        return $query;
    } else {
        echo "<p>Passwords did not match. Please try again.</p>";
        redir(5, "password-reset.php");
    }
}



$username = sanitise($_POST["username"]);
$password = sanitise($_POST["password"]);
$confpassword = sanitise($_POST["confpassword"]);

$query = resetpass($username, $password, $confpassword);
if ($query != null)
{
    runquery($query);
}


?>
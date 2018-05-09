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

    function redir($message, $location)
    {
        echo '<script language="javascript">';

        echo 'alert("'.$message.'")';

        echo '</script>';

        echo "<script>document.location='$location'</script>";
    }

    function login($username, $password)
    {
        $query = "select password from users where username = '$username'";
        require_once("settings.php");
        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );
        $result = mysqli_query($conn, $query);

        if (!$result) {
            redir("Failed to log in. Please try again.", "login.php");
        } else {
            $retrieved = implode(mysqli_fetch_assoc($result));
            $hash = hash('sha512', $password);
            if ($hash == $retrieved)
            {
                setcookie("User", $username);
                redir("Welcome back, $username.", "index.php");
            } else {
                redir("Password incorrect. Please try again.", "login.php");
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }



    $username = sanitise($_POST["username"]);
    $password = sanitise($_POST["password"]);

    login($username, $password);


?>
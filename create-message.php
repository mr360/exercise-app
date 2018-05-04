<?php 
//if(session_status()!=PHP_SESSION_ACTIVE) 
session_start();
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Exercise app" />
    <title>Create Message</title>
    <link rel="icon" type="image/png" href="images/favicon.svg" />
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <?php include 'header.php'; ?>


<?php

function getMessageData($query)
    {
        require ("settings.php");            
        $conn = mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );
        $result = mysqli_query($conn, $query);
        if (!$result) {
            $retrieved = null;
            
        } else {
            $retrieved = implode(mysqli_fetch_assoc($result));
            mysqli_free_result($result);
        }

        mysqli_close($conn);
        
        return $retrieved;
    }

function getMessageUser()
{
    $postnumber = $_GET['postnumber'];
    $mto_query = "SELECT username FROM exerciseDetails WHERE postnumber = '$postnumber'";
    return getMessageData($mto_query);


}

function getMessageSender()
{
    $mfrom = $_COOKIE['User'];   
    $sender_query = "SELECT firstname FROM users WHERE username = '$mfrom'";
   
    return getMessageData($sender_query);


}

function getPhone()
{
    $mfrom = $_COOKIE['User'];   
    $phone_query = "SELECT phone FROM users WHERE username = '$mfrom'";
   
    return getMessageData($phone_query);


}

function createMessageData()
{
    require ("settings.php");
       $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn)
        {
            echo "<p>Database connection failure</p>";
        } 
        else
        {
            $sql_table="messages";
            $query = "select * from messages";

            $result = mysqli_query($conn, $query);
             if(!$result)
            {
                $sqlString= "CREATE TABLE $sql_table(
              
               messageId AUTO_INCREMENT PRIMARY KEY,
                mfrom VARCHAR(50),
                mto VARCHAR(50),
                sender VARCHAR(50),
                phone VARCHAR(50),
                 )";
                $queryResult = @mysqli_query($conn, $sqlString);
             }
             else
             {
                $postnumber = $_GET['postnumber'];
                $mfrom = $_COOKIE['User'];
                $mto = getMessageUser();
                $sender = getMessageSender();
                $phone = getPhone();
                 echo "postnumber is", $postnumber;

                $query = "insert into $sql_table (mfrom, mto, sender, phone, postnumber)  values ('$mfrom', '$mto', '$sender', '$phone', $postnumber)";
            
                 $result = mysqli_query($conn, $query);
                if(!$result)
                {
                    echo "<p class=\"wrong\">Something wrong with", $query, "</p>";
                }
                else
                {
                    echo "<p>message to $mto content $message</p>";
                
                    echo "<button><a href=\"view-listings.php\">Send Message</a></button>";
          
                }

             }
        }


}
createMessageData();

?>

  
</body>

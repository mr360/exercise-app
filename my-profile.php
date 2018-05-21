<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="keywords" content="profile" />
   <link rel="icon" type="image/png" href="images/favicon.svg" />
   <meta name="author" content="Hiep Nguyen"  />
   <!-- Viewport set to scale 1.0 -->
   <meta name = "viewport" content="width=device-width, initial-scale=1.0">
     <!-- Reference to external basic CSS file -->
   <link rel="stylesheet" href="styles/style.css" />

   <title>My Profile</title>
</head>

<body>

<?php include 'header.php'; ?>


<header>
  <h1>My Profile </h1>
</header>

<?php



function TgetProfileData($query)
    {
                    
      require("settings.php");
       $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
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

function TgetFirstName($username)
{
    $firstname_query = "SELECT firstname FROM users WHERE username = '$username'";
    return TgetProfileData($firstname_query);


}

function TgetLastName($username)
{
    $lastname = $_COOKIE['User'];   
    $lastname_query = "SELECT lastname FROM users WHERE username = '$username'";
   
    return TgetProfileData($lastname_query);


}

function TgetEmail($username)
{
    $email_query = "SELECT email FROM users WHERE username = '$username'";
    return TgetProfileData($email_query);


}

function TgetPhone($username)
{
    
    $phone_query = "SELECT phone FROM users WHERE username = '$username'";
   
    return TgetProfileData($phone_query);

}
function TgetNumberOfSentMessage($username)
{
    
    $sent_query = "SELECT count(*) FROM messages WHERE mfrom = '$username'";
   
    return TgetProfileData($sent_query);

}

function TgetNumberOfReceiveMessage($username)
{
    
    $receive_query = "SELECT count(*) FROM messages WHERE mto = '$username'";
   
    return TgetProfileData($receive_query);

}

function TcreateProfile()
{
       $username = $_COOKIE['User'];
       $firstname = TgetFirstName($username);
       $lastname = TgetLastName($username);
       $email = TgetEmail($username);
       $phone = TgetPhone($username);
       $numberSentMessage = TgetNumberOfSentMessage($username);
       $numberReceivedMessage = TgetNumberOfReceiveMessage($username);

        echo "<section class = \"sec2\">\n";

          echo "<p><strong>My name is:</strong></p>",$firstname, " " , $lastname,"\n";

          echo "<p><strong>My email is:</strong></p>",$email,"\n";

          echo "<p><strong>My Phone number is:</strong></p>",$phone,"\n";
          echo "<p><strong>Number of Message I've sent:</strong></p>",$numberSentMessage,"\n";
          echo "<p><strong>Number of Message I've received:</strong></p>",$numberReceivedMessage,"\n";


        echo "</section>\n";



}
createProfile();

?>

</body>


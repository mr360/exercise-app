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

   <title>About Myself</title>
</head>

<body>

<?php include 'header.php'; ?>


<header>
  <h1>About Myself</h1>
</header>

<?php



function getProfileData($query)
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

function getUserName($postnumber)
{
    
    $username_query = "SELECT username FROM exerciseDetails WHERE postnumber = '$postnumber'";
    return getProfileData($username_query);
}

function getFirstName($username)
{
    $firstname_query = "SELECT firstname FROM users WHERE username = '$username'";
    return getProfileData($firstname_query);


}

function getLastName($username)
{
    $lastname = $_COOKIE['User'];   
    $lastname_query = "SELECT lastname FROM users WHERE username = '$username'";
   
    return getProfileData($lastname_query);


}

function LgetGender($postnumber)
{
    $gender_query = "SELECT Gender FROM exerciseDetails WHERE postnumber = '$postnumber'";
    return getProfileData($gender_query);


}

function LgetAge($postnumber)
{
    
    $age_query = "SELECT Age FROM exerciseDetails WHERE postnumber = '$postnumber'";
   
    return getProfileData($age_query);

}

function getNumberOfSentMessage($username)
{
    
    $sent_query = "SELECT count(*) FROM messages WHERE mfrom = '$username'";
   
    return getProfileData($sent_query);

}

function getNumberOfReceiveMessage($username)
{
    
    $receive_query = "SELECT count(*) FROM messages WHERE mto = '$username'";
   
    return getProfileData($receive_query);

}


function createProfile()
{
       $postnumber = $_GET['postnumber'];
       $username = getUserName($postnumber);
       $firstname = getFirstName($username);
       $lastname = getLastName($username);
       $gender = LgetGender($postnumber);
       $age = LgetAge($postnumber);
        $numberSentMessage = getNumberOfSentMessage($username);
       $numberReceivedMessage = getNumberOfReceiveMessage($username);


        echo "<section class = \"sec2\">\n";

            echo "<p><strong>My name is:</strong></p>",$firstname, " " , $lastname,"\n";
            echo "<p><strong>My gender is:</strong></p>",$gender, "\n";
            echo "<p><strong>My age range is:</strong></p>",$age, "\n";
            echo "<p><strong>Number of Message I've sent:</strong></p>",$numberSentMessage,"\n";
            echo "<p><strong>Number of Message I've received:</strong></p>",$numberReceivedMessage,"\n";

        echo "</section>\n";



}
createProfile();

?>

</body>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Exercise app" />
    <title>Load Listing</title>
    <link rel="icon" type="image/png" href="images/favicon.svg" />
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <?php include 'header.php'; ?>
    

<?php
      
  
    function sanitise_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

       
        
   function getExerciseData()
   {
        $exercise = $_POST["Exercise"];
        $exercise = sanitise_input ($exercise);
        return $exercise;

   }

    function getAthleticData()
    {
         $athletic = $_POST["Athletic"];
        $athletic = sanitise_input ($athletic);
        //echo "<p>Athletic is $athletic</p>";
        return $athletic;

    }
    // echo "<p>Athletic is </p>".getAthleticData();

    function getLocation()
    {
        $location = $_POST["Location"];
        $location = sanitise_input ($location);
        //echo "<p>BlurbDetails is $blurbDetails</p>";
        return $location;

    }
    function getGender()
    {
        $gender = $_POST["gender"];
        return $gender;
    }
    function getAge()
    {
        
        $age = $_POST["age"];
        return $age;

    }


     function getBlurbDetails()
    {
        $blurbDetails = $_POST["blurbDetails"];
        $blurbDetails = sanitise_input ($blurbDetails);
        //echo "<p>BlurbDetails is $blurbDetails</p>";
        return $blurbDetails;

    }

     function insertInputToListingTable($exercise, $athletic, $location, $blurbDetails, $username, $gender, $age)
    {
       require("settings.php");
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        $query = "insert into exerciseDetails (Exercise, Athletic, Location, BlurbDetails, username, Gender, Age)  values ('$exercise', '$athletic', '$location', '$blurbDetails', '$username', '$gender', '$age')";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        return $result;
    }

   

    function loadData()
    {
        require_once("settings.php");
       $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn){
            echo "<p>Database connection failure</p>";
        } 
        else
        {
        $sql_table="exerciseDetails";
        $query = "select * from exerciseDetails";

        $result = mysqli_query($conn, $query);
        if(!$result){
            $sqlString= "CREATE TABLE $sql_table(
              
               PostNumber AUTO_INCREMENT PRIMARY KEY,
               create_time NULL DEFAULT CURRENT_TIMESTAMP,
                Exercise VARCHAR(45),
                Athletic VARCHAR(45),
                Location VARCHAR(45),
                BlurbDetails VARCHAR(100),
                username VARCHAR(50),
                Gender VARCHAR(6),
                Age VARCHAR(6),
            )";
            $queryResult = @mysqli_query($conn, $sqlString);
        }
        else
        {
           // $postNumber = mysqli_insert_id($conn);
            // echo "<p>post number is $postNumber</p>" ;
            $exercise = getExerciseData();
            $athletic = getAthleticData();
            $location = getLocation();
            $blurbDetails = getBlurbDetails();
            $username =  $_COOKIE['User'];
            $gender = getGender();
            $age = getAge();
                        
            $result = insertInputToListingTable($exercise, $athletic, $location, $blurbDetails, $username, $gender, $age);
            
            if(!$result)
            {
                echo "<p class=\"wrong\">Something wrong with", $query, "</p>";
            }
            else
            {
                 echo "<p>Your exercise details are:</p>";
                echo "<p>Exercise is: $exercise</p>";
                echo "<p>Athletic Ability is: $athletic</p>";
                echo "<p>Location is: $location</p>";
                 echo "<p>Your Gender is: $gender</p>";
                  echo "<p>Your age is: $age</p>";
                echo "<p>Other details is: $blurbDetails</p>";
                echo "<button><a href=\"view-listings.php\">Post Your Exercise</a></button>";
                
        
            }
            
        }
           
   //mysqli_free_result($result);
    
    }

    mysqli_close($conn);
}

loadData();



?>

</body>

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
       // echo "<p>Exercise is $exercise</p>";
        return $exercise;

   }
//echo "<p>Exercise is </p>".getExerciseData();

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

     function getBlurbDetails()
    {
        $blurbDetails = $_POST["blurbDetails"];
        $blurbDetails = sanitise_input ($blurbDetails);
        //echo "<p>BlurbDetails is $blurbDetails</p>";
        return $blurbDetails;

    }

   

    function loadData()
    {
        require("setting.php");
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
                BlurbDetails VARCHAR(100)
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
            
            

            $query = "insert into $sql_table (Exercise, Athletic, Location, BlurbDetails)  values ('$exercise', '$athletic', '$location', '$blurbDetails')";
             $result = mysqli_query($conn, $query);
            if(!$result)
            {
                echo "<p class=\"wrong\">Something wrong with", $query, "</p>";
            }
            
        }
           
   // mysqli_free_result($result);
    
    }
    mysqli_close($conn);
}




function displayData()
{
    require("setting.php");
   $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn)
    {
        echo "<p>Database connection failure</p>";
    } 
    else
    {
        $sql_table="exerciseDetails";
        $query = "select * from exerciseDetails";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
             echo "<p>Something is wrong with", $query, "</p>";
        } else
        {
        
                echo "<table border=\"1\">\n";
                echo "<tr>\n"
                ."<th scope=\"col\">Exercise</th>\n"
                ."<th scope=\"col\">Athletic</th>\n"
                ."<th scope=\"col\">Location</th>\n"
                ."<th scope=\"col\">BlurbDetails</th>\n"
                ."<th scope=\"col\">TimeStamp</th>\n"
                
                ."</tr>\n";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>\n";
                    echo "<td>",$row["Exercise"],"</td>\n";
                    echo "<td>",$row["Athletic"],"</td>\n";
                    echo "<td>",$row["Location"],"</td>\n";
                    echo "<td>",$row["BlurbDetails"],"</td>\n";
                    echo "<td>",$row["create_time"],"</td>\n";

                    echo "<td><button><a href=sendMessage.php>Send Message</a></button></td>\n";


                
                    echo "</tr>\n";

            }
            echo "</table>\n";
            mysqli_free_result($result);


    }

mysqli_close($conn);
}

}
loadData();
displayData();


?>
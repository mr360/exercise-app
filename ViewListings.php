
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="listing" content="exercise details" />
   <meta name="keywords" content="exercise, athletic ability, location" />
   <meta name="author" content="Hiep Nguyen"  />
   <link rel="stylesheet" href="styles/style.css" />
   <title>View Listings</title>
</head>

<body>

<?php include 'header.php'; ?>


<header>
  <h1>Details of Current Exercise </h1>
</header>
<?php 
require("settings.php");
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
        }
        else
        
        {


            while ($row = mysqli_fetch_assoc($result)){
              
                echo "<table class = \"viewListingTable\">\n";
                   // echo "<thread>\n";
                    echo "<tr>\n";
                        echo "<th scope=\"col\">Exercise</th>\n";
                        echo "<th scope=\"col\">Athletic</th>\n";
                        echo "<th scope=\"col\">Location</th>\n";
                        echo "<th scope=\"col\"> </th>\n";

                     echo "</tr>\n";
                   //  echo "</thread>\n";
                    // echo "<tfoot>\n";
                        echo "<tr>\n";
                         echo "<td>",$row["Exercise"],"</td>\n";
                         echo "<td>",$row["Athletic"],"</td>\n";
                        echo "<td>",$row["Location"],"</td>\n";
                        echo "<td><button><a href=createMessage.php?postnumber=",$row["postNumber"],">Send Message</a></button></td>\n";
                     echo "</tr>\n";

                      echo "<tr>\n";
                      echo "<td colspan=\"3\">",$row["BlurbDetails"],"</td>\n";
                    echo "<td>",$row["create_time"],"</td>\n";
                    echo "</tr>\n";
                   //  echo "</tfoot>\n";

                    //echo "<tr>\n";
                   // echo "<td colspan = \"4\" >",$row["BlurbDetails"],"</td>\n";
                    // echo "</tr>\n";

                   // echo "<td><button><a href=sendMessage.php?postnumber=",$row["postNumber"],">Send Message</a></button></td>\n";
                 

                    echo "</table>\n";

            }
            
            mysqli_free_result($result);


    }

mysqli_close($conn);
}

 ?>
  


</body>






   
    

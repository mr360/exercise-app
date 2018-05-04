
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="listing" content="exercise details" />
   <meta name="keywords" content="exercise, athletic ability, location" />
   <meta name="author" content="Hiep Nguyen"  />
   <link rel="stylesheet" href="styles/style.css" />
   <title>View Message</title>
</head>

<body>

<?php include 'header.php'; ?>


<header>

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
        $curuser = $_COOKIE['User'];
        $sql_table="messages";
        $cmd = $_GET["cmd"];
        $id = $_GET["id"];
        //echo "cmd",$cmd;
        if ($cmd == "accept") {
          // update status = accepted. 
          $query = "update messages set status = 'accepted' where messageId = $id";
          //echo "query",$query;
          $result = mysqli_query($conn, $query);
        }

        if ($cmd == "decline") {
          // update status = declined 
          $query = "update messages set status = 'declined' where messageId = $id";
          //echo "query",$query;
          $result = mysqli_query($conn, $query);
        }
        
        //echo "result", $result;
        $query = "select * from messages m, exerciseDetails e where m.postnumber = e.postNumber and (m.mfrom = '$curuser' or m.mto = '$curuser')";
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
             echo "<p>Something is wrong with", $query, "</p>";
        }
        else
        
        {


            while ($row = mysqli_fetch_assoc($result)){

            if($curuser==$row["mto"])
            {
               echo "<table class = \"viewListingTable\">\n";
                
                    echo "<tr>\n";
                        echo "<th scope=\"col\">Exercise</th>\n";
                        echo "<th scope=\"col\">Athletic</th>\n";
                        echo "<th scope=\"col\">Location</th>\n";
                        echo "<th scope=\"col\">",$row["create_time"],"</th>\n";

                     echo "</tr>\n";
                  
                        echo "<tr>\n";
                          echo "<td>",$row["Exercise"],"</td>\n";
                          echo "<td>",$row["Athletic"],"</td>\n";
                          echo "<td>",$row["Location"],"</td>\n";
                          if ($row["status"] == "waiting") {
                            echo "<td><p><button><a href='view-messages.php?cmd=accept&id=",$row["messageId"],"'>Accept and Display Phone</a></button></p>";
                            echo "<p><button><a href='view-messages.php?cmd=decline&id=",$row["messageId"],"'>Decline</a></button></p></td>\n";
                          } else {
                            echo "<td><strong>",$row["status"],"</strong></td>";
                          }
                        echo "</tr>\n";
                        echo "<tr>\n";
                          echo "<td colspan=\"4\">I am",$row["sender"],"</td>\n";
                        echo "</tr>\n";
                echo "</table>\n";
            }
            if($curuser==$row["mfrom"])
            { 

                echo "<table class = \"viewListingTable\">\n";
                
                    echo "<tr>\n";
                        echo "<th scope=\"col\">Exercise</th>\n";
                        echo "<th scope=\"col\">Athletic</th>\n";
                        echo "<th scope=\"col\">Location</th>\n";
                        echo "<th scope=\"col\">",$row["create_time"],"</th>\n";

                     echo "</tr>\n";
                  
                        echo "<tr>\n";
                          echo "<td>",$row["Exercise"],"</td>\n";
                          echo "<td>",$row["Athletic"],"</td>\n";
                          echo "<td>",$row["Location"],"</td>\n";
                          // echo "status:",$row["status"];
                          if ($row["status"] == 'waiting') {
                            echo "<td><strong>Awaiting Response</strong></td>";
                          }
                          if ($row["status"] == 'accepted') {
                            echo "<td>Please call me at this number<br><strong>",$row["phone"],"</strong></td>";
                          }
                          if ($row["status"] == 'declined') {
                            echo "<td><strong>Declined</strong></td>";
                          }
                        echo "</tr>\n";
                        echo "<tr>\n";
                          echo "<td colspan=\"4\">I am",$row["sender"]," ... blah bha...</td>\n";
                        echo "</tr>\n";
                echo "</table>\n";
            }
              
               
            }

            }
            
            mysqli_free_result($result);


    }

    mysqli_close($conn);


 ?>
  


</body>






   
    

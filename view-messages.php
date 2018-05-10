
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="listing" content="exercise details" />
   <meta name="keywords" content="exercise, athletic ability, location" />
   <link rel="icon" type="image/png" href="images/favicon.svg" />
   <meta name="author" content="Hiep Nguyen"  />
   <!-- Viewport set to scale 1.0 -->
   <meta name = "viewport" content="width=device-width, initial-scale=1.0">
   <!-- Reference to external basic CSS file -->
   <link rel="stylesheet" href="styles/style.css" />


   <title>View Message</title>
</head>

<body>

<?php include 'header.php'; ?>


<header>

</header>
<?php 

function connection1()
    {
       require("settings.php");
       $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
       return $conn; 
    }
function getMessages($conn, $curuser) {
 
  $query = "select * from messages m, exerciseDetails e where m.postnumber = e.postNumber and (m.mfrom = '$curuser' or m.mto = '$curuser')";
  
  return mysqli_query($conn, $query);
}

function updateMessage($conn, $id, $status) {

    $query = "update messages set status = '$status' where messageId = $id";
    return mysqli_query($conn, $query);
}    

function viewMessage()
{
  $conn = connection1();
  if (!$conn)
    {
      echo "<p>Database connection failure</p>";
    } 
    else
    {
        $curuser = $_COOKIE['User'];
        $sql_table="messages";
        if (isset($_GET["cmd"]))
        {
            $cmd = $_GET["cmd"];
            $id = $_GET["id"];
            //echo "cmd",$cmd;
            if ($cmd == "accept") {
                updateMessage($conn, $id, "accepted");
            }

            if ($cmd == "decline") {
                updateMessage($conn, $id, "declined");
            }
        }

        
        $result = getMessages($conn, $curuser);

        if(!$result)
        {
             echo "<p>Something is wrong with workWithDatabase query</p>";
        }
        else
        
        {
            while ($row = mysqli_fetch_assoc($result)){

            if($curuser==$row["mto"])
            {
              

              echo "<section class = \"sec1\">\n";

                echo "<div class = \"div1\">\n";
                  echo "<p><strong>Exercise:</strong></p>",$row["Exercise"],"\n";

                echo "</div>\n";

                echo "<div class = \"div2\">\n";
                  echo "<p><strong>Athletic:</strong></p>",$row["Athletic"],"\n";

                echo "</div>\n";

                echo "<div class = \"div3\">\n";
                  echo "<p><strong>Location:</strong></p>",$row["Location"],"\n";

                echo "</div>\n";

                echo "<div class = \"div4\">\n";

                  echo "<p><strong>Gender:</strong></p>",$row["Gender"],"\n";

                echo "</div>\n";

                echo "<div class = \"div5\">\n";

                  echo "<p><strong>Age:</strong></p>",$row["Age"],"\n";

                echo "</div>\n";
                echo "<div class = \"div6\">\n";
                  echo "<p> Time post: ",$row["create_time"],"</p>\n";
                 if ($row["status"] == "waiting") {
                            echo "<p><button><a href='view-messages.php?cmd=accept&id=",$row["messageId"],"'>Accept and Display Phone</a></button></p>\n";
                            echo "<p><button><a href='view-messages.php?cmd=decline&id=",$row["messageId"],"'>Decline</a></button></p>\n";
                          } else {
                            echo "<strong>",$row["status"],"</strong>";
                          }

                echo "</div>\n";
                

                 echo "<div class = \"div7\">\n";

                  echo "<p>Hi, my name is ",$row["sender"]," and I am interested in exercising with you</p>\n";

                echo "</div>\n";
                 

               echo "</section>\n";

            }

            
            if($curuser==$row["mfrom"])
            { 
               echo "<section class = \"sec1\">\n";

                echo "<div class = \"div1\">\n";
                  echo "<p><strong>Exercise:</strong></p>",$row["Exercise"],"\n";

                echo "</div>\n";

                echo "<div class = \"div2\">\n";
                  echo "<p><strong>Athletic:</strong></p>",$row["Athletic"],"\n";

                echo "</div>\n";

                echo "<div class = \"div3\">\n";
                  echo "<p><strong>Location:</strong></p>",$row["Location"],"\n";

                echo "</div>\n";

                echo "<div class = \"div4\">\n";

                  echo "<p><strong>Gender:</strong></p>",$row["Gender"],"\n";

                echo "</div>\n";

                echo "<div class = \"div5\">\n";

                  echo "<p><strong>Age:</strong></p>",$row["Age"],"\n";

                echo "</div>\n";
                echo "<div class = \"div6\">\n";
                  echo "<p> <strong>Time post: </strong>",$row["create_time"],"</p>\n";
                 if ($row["status"] == 'waiting') {
                            echo "<strong>Awaiting Response</strong>";
                          }
                          if ($row["status"] == 'accepted') {
                            echo "Please call me at this number<br><strong>",$row["phone"],"</strong>";
                          }
                          if ($row["status"] == 'declined') {
                            echo "<strong>Declined</strong>";
                          }

                echo "</div>\n";
                

                 echo "<div class = \"div7\">\n";

                  echo "<p>Hi, my name is ",$row["sender"]," and I am interested in exercising with you</p>\n";

                echo "</div>\n";
                 

               echo "</section>\n";

                
            }
              
               
            }

            }
            
            mysqli_free_result($result);


    }

    mysqli_close($conn);
}


viewMessage();

 ?>
  


</body>






   
    

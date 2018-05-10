<?php
      
   /* echo "<p>message</p>";

        $cmd = $_GET['cmd'];
        $id = $_GET['id'];
        if ($cmd == "accept") {
        	echo "accept message to post:",$id;	
        	
        } else {
        	echo "Send message to post:",$_GET['postnumber'];	
        	echo "<a href=send-message.php?cmd=accept&id=1>accept message</a>";	
        }*/

        require("settings.php");
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
                        echo "<td><a class='button' =send-message.php?postnumber=",$row["postNumber"],">Send Message</a></td>\n";
                     echo "</tr>\n";

                      echo "<tr>\n";
                      echo "<td colspan=\"3\">",$row["BlurbDetails"],"</td>\n";
                    echo "<td>",$row["create_time"],"</td>\n";
                    echo "</tr>\n";
                   

                    echo "</table>\n";

            }
            
            mysqli_free_result($result);


    }

mysqli_close($conn);
}
?>
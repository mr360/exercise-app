
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

    <title>View Listings</title>
</head>

<body>

<?php include 'header.php'; ?>


<header>
    <h1>Details of Current Exercise </h1>
</header>
<?php

function connection()
{
    require("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    return $conn;
}

function generateQuery()
{
    $selectoptions = $_POST['selectoptions'];
    $sort = $_POST['sort'];

    $sortoption = "order by $sort";
    $wherequery = "where";
    $whereused = false;

    foreach ($selectoptions as $selectoption=>$selected)
    {
        if ($whereused)
        {
            $wherequery = $wherequery . " and";
        }
        if ($selected == "genderbool")
        {
            $whereused = true;
            $gender = $_POST['gender'];
            $wherequery = $wherequery . " gender = '$gender'";
        }
        if ($selected == "agebool")
        {
            $whereused = true;
            $age = $_POST['age'];
            $wherequery = $wherequery . " age = '$age'";
        }
    }

    if ($whereused)
    {
        $query = "select * from exerciseDetails $wherequery $sortoption";
    } else {
        $query = "select * from exerciseDetails $sortoption";
    }

    return $query;
}

function viewListing()
{
    require("settings.php");
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn)
    {
        echo "<p>Database connection failure</p>";
    }
    else
    {

        $sql_table="messages";
        $query = generateQuery();
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            echo "<p>Something is wrong with", $query, "</p>";
        }
        else

        {

            $resultsprinted = false;

            while ($row = mysqli_fetch_assoc($result)){

                $resultsprinted = true;

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

                echo "<p class='button'><a href=create-message.php?postnumber=",$row["postNumber"],">Send Message</a> </p>
                  <p class='button'><a href=user-profile.php?postnumber=",$row["postNumber"],">See Profile</a> </p>
                  <p> Time post: ",$row["create_time"],"</p>\n";;

                echo "</div>\n";


                echo "<div class = \"div7\">\n";

                echo "<p><strong>BlurbDetails:</strong></p>",$row["BlurbDetails"],"\n";

                echo "</div>\n";


                echo "</section>\n";



            }

            if (!$resultsprinted)
            {
                echo "<p>No results found. Please try expanding your criteria, and try again.</p>";
            }

            mysqli_free_result($result);


        }

        mysqli_close($conn);
    }
}

viewListing();


?>



</body>









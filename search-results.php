
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

<?php 
include 'header.php'; 
include 'view-listings.php';
?>


<header>
    <h1>Details of Current Exercise </h1>
</header>
<?php


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

//viewListing();


?>



</body>









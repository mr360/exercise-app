<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Exercise app" />
    <title>Exercise app</title>
    <link rel="icon" type="image/png" href="images/favicon.svg" />
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
<?php include 'header.php'; ?>

<form id="searchlists" action="search-results.php" method="post">
    <fieldset>
        <legend>
            Search for only:
        </legend>
        <p>
            <label for="genderbool">Search by gender?</label>
            <input type="checkbox" id="genderbool" name="selectoptions[]" value="genderbool" />
            <br />
            <input type="radio" id="male" name="gender" value="male" />
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female" />
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other" />
            <label for="other">Other</label>
            <br />
            <br />
            <label for="agebool">Search by age?</label>
            <input type="checkbox" id="agebool" name="selectoptions[]" value="agebool" />
            <br />
            <input type="radio" id="18-25" name="age" value="18-25" />
            <label for="18-25">18-25</label>
            <input type="radio" id="26-33" name="age" value="26-33" />
            <label for="26-33">26-33</label>
            <input type="radio" id="34-42" name="age" value="34-42" />
            <label for="34-42">34-42</label>
            <input type="radio" id=">42" name="age" value=">42" />
            <label for=">42">>42</label>
        </p>
    </fieldset>
    <fieldset>
        <legend>
            Order by:
        </legend>
        <p>
            <input type="radio" id="Gender" name="sort" value="Gender" required="required"/>
            <label for="Gender">Gender</label>
            <input type="radio" id="Age" name="sort" value="Age" />
            <label for="Age">Age</label>
            <input type="radio" id="create_time" name="sort" value="create_time" />
            <label for="create_time">Time Posted</label>
            <input type="radio" id="Location" name="sort" value="Location" />
            <label for="Location">Location</label>
            <input type="radio" id="username" name="sort" value="username" />
            <label for="username">Username</label>
        </p>
    </fieldset>
    <input type="submit" value="Search" />
</form>
</body>
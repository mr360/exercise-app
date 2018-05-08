

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Exercise app" />
    <title>Listing</title>
    <link rel="icon" type="image/png" href="images/favicon.svg" />
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
    <?php include 'header.php'; ?>

<header>
  <h1>Details About Your Exercise </h1>
</header>

       <form id="listing" method="post" action="load-listings.php" novalidate="novalidate">
              
            <fieldset id="details">
             <legend>Please enter your exercise details</legend>
               <p><label for="exercise">Exercise</label>
                  <input type="text" name="Exercise" id="exercise" maxlength="20" size="20"/></p>

               <p><label for="athletic">Athletic Ability</label>
                  <input type="text" name="Athletic" id="athletic" maxlength="20" size="20"/>
                </p>
                <p><label for="location">Location</label>
                  <input type="text" name="Location" id="location" maxlength="20" size="20"/>
                </p>

                 <p><span id="gender"> Your gender is<br/>
                  <label><input type="radio" name="gender" id ="male" value="male"/>Male</label>
                    <label><input type="radio" name="gender" id ="female" value="female"/>Female</label>
                    <label><input type="radio" name="gender"  id="other" value="other"/>Other</label>
                  </span></p>

                   <p><span id="age"> Your age is<br/>
                  <label><input type="radio" name="age" id ="18-25" value="18-25"/>18-25</label>
                    <label><input type="radio" name="age" id ="26-33" value="26-33"/>26-33</label>
                    <label><input type="radio" name="age"  id="34-42" value="34-42"/>34-42</label>
                    <label><input type="radio" name="age"  id=">42" value=">42"/> >42 </label>
                  </span></p>

               <p>Blurb details about your exercise</p>
           <p><label><textarea name="blurbDetails" id="blurbDetails" rows="10" cols="80"></textarea></label></p>
               

            </fieldset>

            <input type="submit" value="Create Listing" />
            <input type="reset" value="Cancel" />
       </form>

</body>

</html>
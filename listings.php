<!--this listing page allow user to enter their details, these details then will be displayed in Viewing Listing page -->

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="description" content="user details" />
   <meta name="keywords" content="exercise, athletic ability, location" />
   <meta name="author" content="Hiep Nguyen"  />
   <title>Listing</title>
</head>

<body>

<?php include 'header.php'; ?>

<header>
  <h1>Details About Your Exercise </h1>
</header>

     
       <form id="listing" method="post" action="viewListings.php" novalidate="novalidate">
              
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
               <p>Blurb details about your exercise</p>
           <p><label><textarea name="blurbDetails" id="blurbDetails" rows="10" cols="80"></textarea></label></p>
               

            </fieldset>

            <input type="submit" value="Create Listing" />
            <input type="reset" value="Cancel" />
       </form>

</body>

</html>

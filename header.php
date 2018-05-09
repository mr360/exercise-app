<header>
    <h1 id="title">Exercise App</h1>
    <br />
    <?php
        if (isset($_COOKIE['User']))
        {
            $user = $_COOKIE['User'];
            echo "<nav><p id=\"user\">
                Welcome back $user
                </p>
                <br />
                <a href='logout.php'>Logout</a></nav> ";
        }
    ?>
    <br />
    <nav id="links">
        <a href="index.php">Home</a>
        <?php
        if (!(isset($_COOKIE['User'])))
        {
            echo "<a href=\"login.php\">Login</a>
                    <a href=\"new-user.php\">Create Account</a> ";
        } else {
            echo "<a href=\"listings.php\">Create Listing</a>
                    <a href=\"view-listings.php\">View Listings</a>
                    <a href=\"view-messages.php\">View Messages</a>";
        }
        ?>
    </nav>
    <hr />
</header>
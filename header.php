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
        <a href="login.php">Login</a>
        <a href="new-user.php">Create Account</a>
        <a href="listings.php">Listings</a>
    </nav>
    <hr />
</header>
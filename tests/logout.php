<?php

use PHPUnit\Framework\TestCase;

class LogoutTest extends PHPUnit\Framework\TestCase
{
    public function testLogout()
    {
        setcookie("User", "test");
        require_once "/builds/maxcb97/exercise-app/logout.php";
        $this->assertFalse(isset($_COOKIE['User']));
    }
}

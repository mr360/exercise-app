<?php

use PHPUnit\Framework\TestCase;

class LogoutTest extends PHPUnit\Framework\TestCase
{
    public function testLogout()
    {
        setcookie("User", "test");
        require_once "../../logout.php";
        $this->assertFalse(isset($_COOKIE['User']));
    }
}

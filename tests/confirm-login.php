<?php

use PHPUnit\Framework\TestCase;
require "../../confirm-login.php";

class LoginTest extends PHPUnit\Framework\TestCase
{
    public function testSanitise()
    {
        $test = sanitise("hello");
        $expected = "hello";
        $this->assertEquals($expected, $test);
        $test = sanitise("hel\\lo");
        $expected = "hello";
        $this->assertEquals($expected, $test);
        $test = sanitise("hello ");
        $expected = "hello";
        $this->assertEquals($expected, $test);
        $test = sanitise("he llo");
        $expected = "hello";
        $this->assertEquals($expected, $test);
        $test = sanitise("hel!@#$%^&*()_+=-[]\;',./{}|:\"<>?lo");
        $expected = "hello";
        $this->assertEquals($expected, $test);
    }

    public function testHash()
    {
        $hash = hash('sha512', 'test');
        $expected = "ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff";
        $this->assertEquals($expected, $hash);
        $hash = hash('sha512', '!@#$%^&*()_+{}:"<>?/.,\';\][=-');
        $expected = "72ad5fc6e6774a6f7bbbbc6ff9d464019ea23aa9eb5225bff0c7143d05a546d7a51ada5b62ee4ab383a0e32c5d68fb1fa02c089c9543a3dc55841113f333f005";
        $this->assertEquals($expected, $hash);
    }
}

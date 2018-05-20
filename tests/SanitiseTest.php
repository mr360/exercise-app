<?php

use PHPUnit\Framework\TestCase;
include_once("../confirm-login.php");

class SanitiseTest extends PHPUnit\Framework\TestCase
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
}

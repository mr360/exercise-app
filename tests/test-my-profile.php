<?php

use PHPUnit\Framework\TestCase;
require "../my-profile.php";

class MyProfileTest extends PHPUnit\Framework\TestCase
{
    public function testGetProfileData()
    {
        $test = getProfileData('SELECT firstname FROM users WHERE username = "helen"');
        $expected = "Helen";
        $this->assertEquals($expected, $test);
        
    }

    public function testGetFirstName()
    {
        $test = getFirstName("helen");
        $expected = "Helen";
        $this->assertEquals($expected, $test); 
        
    }


    public function testGetLastName()
    {
        $test = getLastName("helen");
        $expected = "Nguyen";
        $this->assertEquals($expected, $test); 
        
    }


    public function testGetEmail()
    {
        $test = getEmail("helen");
        $expected = "myhiep2910@yahoo.com";
        $this->assertEquals($expected, $test); 
        
    }

    public function testGetPhone()
    {
        $test = getPhone("helen");
        $expected = "0422111111";
        $this->assertEquals($expected, $test); 
        
    }

    public function testGetNumberOfSentMessage()
    {
        $test = getNumberOfSentMessage("helen");
        $expected = "2";
        $this->assertEquals($expected, $test); 
        
    }

    public function testGetNumberOfReceivedMessage()
    {
        $test = getNumberOfReceiveMessage("helen");
        $expected = "2";
        $this->assertEquals($expected, $test); 
        
    }


}

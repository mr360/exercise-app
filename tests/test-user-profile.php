<?php

use PHPUnit\Framework\TestCase;
include_once("/builds/maxcb97/exercise-app/my-profile.php");

class UserProfileTest extends PHPUnit\Framework\TestCase
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


    public function testGetGender()
    {
        $test = getEmail("helen");
        $expected = "myhiep2910@yahoo.com";
        $this->assertEquals($expected, $test); 
        
    }

    public function testGetAge()
    {
        $test = getPhone("helen");
        $expected = "0422111111";
        $this->assertEquals($expected, $test); 
        
    }

}

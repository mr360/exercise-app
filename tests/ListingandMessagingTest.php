<?php

use PHPUnit\Framework\TestCase;
include_once("../load-listings.php");
include_once("../view-listings.php");
include_once("../create-message.php");
include_once("../view-messages.php");


class TestListingAndMessaging extends PHPUnit\Framework\TestCase
{
    
     public function testSanitise_input()
    {

        $result = sanitise_input("   helen ");
        $this->assertEquals("helen", $result);
   }


     public function testConnection()
    {
        $result = connection();
        $this->assertNotNull($result, "connection failed");
   }
   
   public function testInsertInputToListingTable()
   {
    $result = insertInputToListingTable("running","good","pascoe_vale", "running around the park", "test", "male", "18-25");
    $this->assertNotNull($result, "can not load data to listng table");
   }



   public function testCreateMessageTable()
   {
    $result = createMessageTable("test","test1","shuayb", "2345566", "105");
    $this->assertNotNull($result, "can not load data to message table");
   }

    public function testGetMessage()
    {
        $conn = connection();
        $result = getMessages($conn, "test");
        $this->assertNotNull($result, "can not get messages for user 'test'");
   }

   public function testUpdateMessage() 
   {
        $conn = connection();
        $result = updateMessage($conn, '48', "accepted");
        $this->assertNotNull($result, "can not update status of this message");
    
    }
    public function testGetMessageQuery()
    {
        $conn = connection();
        $result = getMessages($conn, "test");
        $this->assertEquals(mysqli_query($conn, "select * from messages m, exerciseDetails e where m.postnumber = e.postNumber and (m.mfrom = 'test' or m.mto = 'test')"), $result);
    }

    public function testUpdateMessageQuery()
    {
        $conn = connection();
        $result = updateMessage($conn, '48', "accepted");
        $this->assertEquals(mysqli_query($conn, "update messages set status = 'accepted' where messageId = 48"), $result);
    }

    public function testGetExerciseData()
    {
        $_POST["Exercise"] = "Walking";
        $result = getExerciseData();
        $this->assertEquals("Walking", $result);
    }

    public function testGetAthleticData()
    {
        $_POST["Athletic"] = "Fit";
        $result = getAthleticData();
        $this->assertEquals("Fit", $result);
    }

    public function testGetLocation()
    {
        $_POST["Location"] = "Melbourne";
        $result = getLocation();
        $this->assertEquals("Melbourne", $result);
    }

    public function testGetGender()
    {
        $_POST["gender"] = "Male";
        $result = getGender();
        $this->assertEquals("Male", $result);
    }

    public function testGetAge()
    {
        $_POST["age"] = "59";
        $result = getAge();
        $this->assertEquals("59", $result);
    }

    public function testGetBlurbDetails()
    {
        $_POST["blurbDetails"] = "Seeking person who won't collapse on five minute jog.";
        $result = getBlurbDetails();
        $this->assertEquals("Seeking person who won't collapse on five minute jog.", $result);
    }

    
}


?>
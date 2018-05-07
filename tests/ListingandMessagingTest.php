<?php

use PHPUnit\Framework\TestCase;
require "../load-listings.php";
require "../view-listings.php";
require "../create-message.php";
require "../view-messages.php";


class TestListingAndMessaging extends PHPUnit\Framework\TestCase
{
    
     public function testSanitise_input()
    {

        $result = sanitise_input("   helen ");
        $this->assertEquals("helen", $result);
   }


     public function testConnection()
    {
        $result = connection("127.0.0.1","root","Thi2104#", "EOI");
        $this->assertNotNull($result, "connection failed");
     return $conn;
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
        $result = getMessages($conn, '48', "accepted");
        $this->assertNotNull($result, "can not update status of this message");
    
} 

    
}


?>
<?php

use PHPUnit\Framework\TestCase;
require "/builds/maxcb97/exercise-app/confirm-reset.php";

class ChangePassTest extends PHPUnit\Framework\TestCase
{
    public function testChangePass()
    {
        $test = "newpass";
        $result = resetpass('test', $test, $test);
        $hash = hash('sha512', $test);
        $query = "update users set password = '$hash' where username = 'test'";
        $this->assertEquals($query, $result);
    }
}

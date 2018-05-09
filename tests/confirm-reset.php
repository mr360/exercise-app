<?php

use PHPUnit\Framework\TestCase;
require "../confirm-reset.php";

class ChangePassTest extends PHPUnit\Framework\TestCase
{
    public function testChangePass()
    {
        $test = "newpass";
        $result = resetpass('test', $test, $test);
        $query = "update users set password = '$test' where username = 'test'";
        $this->assertEquals($query, $result);
    }
}

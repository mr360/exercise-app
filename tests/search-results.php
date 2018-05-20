<?php

use PHPUnit\Framework\TestCase;
require "../../search-results.php";

class SearchTest extends PHPUnit\Framework\TestCase
{
    public function testGenerateQuery()
    {
        $_POST['selectoptions'] = array("genderbool", "agebool");
        $_POST['sort'] = "gender";
        $_POST['gender'] = "male";
        $_POST['age'] = "18-25";
        $test = generateQuery();
        $expected = "select * from exerciseDetails where gender = 'male' and age = '18-25' order by gender";
        $this->assertEquals($expected, $test);
    }

}

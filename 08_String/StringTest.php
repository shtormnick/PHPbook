<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 21.04.18
 * Time: 23:03
 */

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function test_strposition()
    {
        $this->assertEquals(6,strpos('hello world', 'world'));

    }

    public function test_strposition2()
    {
        $this->assertEquals( false,strpos('hello world', 'wrld'));

    }

    public function test_strposition3()
    {
        $this->assertEquals(0,strpos('hello world', 'hello'));

    }

    public function test_strposition4()
    {
        $this->assertEquals(0,strpos('world', 'h'));

    }
}

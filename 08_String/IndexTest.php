<?php
/**
 * Created by PhpStorm.
 * User: lorix
 * Date: 21.04.18
 * Time: 21:26
 */



class IndexTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     *
     */
    public function test_strlen()
    {
        $this->assertEquals(12,strlen('Hello World!'),'не правильно;' );
    }
    public function test_strlen1()
    {
      $this->assertEquals(2,strlen(12));
    }

    public function test_strlen2()
    {
        $this->assertEquals(0,strlen(''));
    }

    /**
     *   @expectedException Exception
     *   @expectedExceptionMessage my message
     */
    public function test_strlen3()
    {
        throw new Exception ('my message');
    }



}


<?php

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $User;

    public function setUp()
    {
        $this->User = new User();
    }

//    public function testLoginIfString()
//    {
//    $this->assertIsString($this->User->getLogin());
//    }

    public function testCalculationOfMean()
    {
        $numbers = [3, 7, 6, 1, 5];
        $this->assertEquals(4.4, $this->User->mean($numbers));
        print'PHPUnitTest -> testCalculationOfMean ->  funkcja';
    }

}


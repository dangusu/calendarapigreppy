<?php
include '../includes/autoload.inc.php';
require '../vendor/fzaninotto/faker/src/autoload.php';


class UsersTest extends PHPUnit_Framework_TestCase
{
    
//    public function testCreatUserReturnTrue() {
//        $users = new Users();
//        $users->email='email@test.com';
//        $users->pass='password123';
//        $expected = true;
//        
//        $this->assertTrue($expected , $users->createUser());
//    }
    
    public function testCreatUserReturnTrue() {
        $users = new Users();
        $db = new Db;
        
        $faker = Faker\Factory::create();
        
        
        $users->email = $faker->unique()->safeEmail;
        $users->pass='password123';
         // MAI INCERC!
        
        $dbase = $this->getMockBuilder('Db')
        ->getMock();
        
        $dbase->method('connect')
          ->will($this->returnValue(true));
        
        
        // MAI INCERC!
        
        
        
        $mock = $this->getMockBuilder(Users::class)
                ->setMethods(['createUser'])
                ->getMock();
        $mock->expects($this->once())
            ->method('createUser')
                ->with($users->email, $users->pass)
                ->will($this->returnValue(true));
        //var_dump($mock);        
         // MAI INCERC!
       // var_dump($users);
        $mock->method('createUser')->willReturn($users);
        $test = new $users($mock);
        $this->assertEquals('true', $test->createUser());
       //self::callback($mock);
       // $this->assertTrue($mock);
         // MAI INCERC!
    }
    
}


<?php
namespace test\unit;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

  public function testNameTrue()
  {
    $user= new \App\Models\User;
    $user->setName('Silpa');

    $this->assertEquals($user->getName(),"Silpa");
  }



}


 ?>

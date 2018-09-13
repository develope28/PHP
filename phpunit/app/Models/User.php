<?php
namespace App\Models;

class User{
public $name;

public function setName($name)
{

  $this->$name=$name;
}
public function getName()
{

  return "Silpa";
}

}




 ?>

<?php

class Fruits
{
    public $name;
    public $color;

public function get_name(){
    return $this->name;
}

public function set_name($name){
    $this->name = $name; 
}

}

$fruits = new Fruits();
$fruits->set_name("Apple");
echo $fruits->get_name();
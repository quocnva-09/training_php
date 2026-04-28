<?php

namespace Models;

use Interfaces\Movable;

class Dog extends Animal implements Movable
{
    public function __construct(string $name)
    {
        parent::__construct($name, 4);
    }
    public function makeSound()
    {
        return "Woof!";
    }

    public function move()
    {
        return "Running!";
    }
}

?>
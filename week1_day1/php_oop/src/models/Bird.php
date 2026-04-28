<?php

namespace Models;

use Interfaces\Movable;

class Bird extends Animal implements Movable
{
    public function __construct(string $name)
    {
        parent::__construct($name, 2);
    }
    public function makeSound()
    {
        return "Chirp!";
    }

    public function move()
    {
        return "Flying!";
    }
}

?>
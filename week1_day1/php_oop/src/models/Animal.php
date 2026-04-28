<?php

namespace Models;

abstract class Animal
{
    protected string $name;
    protected int $legs;

    public function __construct(string $name, int $legs)
    {
        $this->name = $name;
        $this->legs = $legs;
    }

    abstract public function makeSound();

    public function getName(): string
    {
        return $this->name;
    }

    public function getLegs(): int
    {
        return $this->legs;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setLegs(int $legs)
    {
        $this->legs = $legs;
    }
}

?>
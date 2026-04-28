<?php

require_once __DIR__ . '/interfaces/Movable.php';
require_once __DIR__ . '/models/Animal.php';
require_once __DIR__ . '/models/Bird.php';
require_once __DIR__ . '/models/Dog.php';

use Models\Bird;
use Models\Dog;

$dog = new Dog("Cerberus");
$bird = new Bird("Phoenix");

echo $dog->getName() . " says " . $dog->makeSound() . " and moving is " . $dog->move() . "\n";

echo $bird->getName() . " says " . $bird->makeSound() . " and moving is " . $bird->move() . "\n";

?>
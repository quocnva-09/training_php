<?php

use Frameworks\Router;

$router = new Router();

$router->add("/", ["controller" => "product", "action" => "index"]);

return $router;
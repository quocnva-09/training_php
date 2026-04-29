<?php
spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    for ($i = 0; $i < count($parts) - 1; $i++) {
        $parts[$i] = strtolower($parts[$i]);
    }
    $file = __DIR__ . '/../' . implode('/', $parts) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$router = require_once __DIR__ . '/../routes/routes.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($url, $method);
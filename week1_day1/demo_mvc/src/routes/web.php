<?php

use App\Controllers\ProductController;

// Simple router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/products') {
    $controller = new ProductController();
    $controller->index();
} else {
    http_response_code(404);
    echo "<h1>404 Not Found</h1>";
}

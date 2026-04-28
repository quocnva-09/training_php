<?php

spl_autoload_register(function ($class_name) {
    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/../';

    // Split the namespace into parts
    $parts = explode('\\', $class_name);

    // Build path (e.g. App\Controllers\ProductController -> app/controllers/ProductController.php)
    $path = $base_dir;
    for ($i = 0; $i < count($parts) - 1; $i++) {
        $path .= strtolower($parts[$i]) . '/';
    }
    $path .= end($parts) . '.php';

    // If the file exists, require it
    if (file_exists($path)) {
        require $path;
    }
});

// Load routes
require_once __DIR__ . '/../routes/web.php';

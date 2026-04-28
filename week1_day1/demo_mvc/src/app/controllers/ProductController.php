<?php

namespace App\Controllers;

use Config\Database;
use App\Models\Product;

class ProductController {
    private $db;
    private $product;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new Product($this->db);
    }

    public function index() {
        $products = $this->product->readAll();
        
        // Pass data to view
        require_once __DIR__ . '/../views/products/index.php';
    }
}

<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ProductModel;

class ProductController
{
    private $db;
    private $product;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->product = new ProductModel($this->db);
    }

    public function index()
    {
        $products = $this->product->readAll();

        // Pass data to view
        require_once __DIR__ . '/../views/pages/products/index.php';
    }
}

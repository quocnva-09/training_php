<?php

namespace App\Models;

use PDO;

class Product {
    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $price;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        try {
            $query = "SELECT id, name, price FROM " . $this->table_name . " ORDER BY id DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Return mock data if table doesn't exist for practice purposes
            return [
                ['id' => 1, 'name' => 'Mock Product 1', 'price' => 19.99],
                ['id' => 2, 'name' => 'Mock Product 2', 'price' => 29.99],
                ['id' => 3, 'name' => 'Mock Product 3', 'price' => 39.99]
            ];
        }
    }
}

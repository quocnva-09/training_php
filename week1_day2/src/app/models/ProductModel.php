<?php

namespace App\Models;

use PDO;

class ProductModel
{
    private $conn;
    private $table_name = "products";

    public $id;
    public $name;

    public $created_date;

    public $img_path;

    public $price;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        try {
            $query = "SELECT id, name, price, img_path, created_date FROM " . $this->table_name . " ORDER BY id DESC";
            $stmt = $this->conn->prepar($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Lỗi khi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            return [];
        }
    }
}

<?php
declare(strict_types=1);
namespace RegisterProducts\App\Models;

use PDO;
use PDOException;
use Exception;

class Product
{

    protected string $connectionString = "mysql:host=127.0.0.1;dbname=register_products";
    protected string $username = "api";
    protected string $password = "password";

    public function save(array $data): bool
    {
        try {
            $pdo = new PDO($this->connectionString, $this->username, $this->password);
            $stmt = $pdo->prepare("INSERT INTO products (name, description, price, brand) VALUES (:name, :description, :price, :brand)");
            return $stmt->execute($data);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $pdo = new PDO($this->connectionString, $this->username, $this->password);
            $stmt = $pdo->prepare("UPDATE products SET name = :name, description = :description, price = :price, brand = :brand WHERE id = :id");
            $data['id'] = $id;
            return $stmt->execute($data);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getAll(): array
    {
        try {
            $pdo = new PDO($this->connectionString, $this->username, $this->password);
            $stmt = $pdo->query("SELECT * FROM products");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getById($id): array
    {
        try {
            $pdo = new PDO($this->connectionString, $this->username, $this->password);
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $data =  $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (\PDOException $e) {
            throw new \Exception("Database error: " . $e->getMessage());
        }
    }

}
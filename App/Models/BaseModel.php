<?php
declare(strict_types=1);

namespace RegisterProducts\App\Models;

use PDO;
use PDOException;
use Exception;

class BaseModel
{
    protected string $connectionString = "mysql:host=127.0.0.1;dbname=register_products";
    protected string $username = "api";
    protected string $password = "password";
    protected string $tableName = "";
    protected array $columns = [];
    protected string $primaryKey = "id";

    protected function getConnection(): PDO
    {
        try {
            $pdo = new PDO($this->connectionString, $this->username, $this->password);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
        return $pdo;
    }

    protected function validateColumns(array $data): bool
    {
        $localColumns = array_keys($data);
        $diff = array_diff($localColumns, $this->columns);
        if ($diff) {
            return false;
        }
        return true;
    }

    public function executeQuery($sql, $data): bool
    {
        try {
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function save(array $data): bool
    {
        if (!$this->validateColumns($data)) {
            throw new Exception("Hey la validacion de las columnas fallo");
        }
        $columns = implode(",", array_keys($data));
        $sql = "INSERT INTO {$this->tableName} ($columns)";
        $columnsName = ':'. implode(',:', array_keys($data));
        ;
        $sql.=" VALUES({$columnsName})";
        return $this->executeQuery($sql, $data);
    }

    public function update(mixed $id, array $data): bool
    {
        if (!$this->validateColumns($data)) {
            throw new Exception("Hey la validacion de las columnas fallo");
        }
        // $columns = ["name", "description", "price", "brand"];
        // ["name = :name", "description = :description", "price = :price", "brand = :brand"];
        // "name = :name, description = :description, price = :price, brand = :brand";
        $set = implode(', ', array_map(fn ($key) => "$key = :$key", array_keys($data)));
        $sql = "UPDATE {$this->tableName} SET {$set} WHERE {$this->primaryKey} = :{$this->primaryKey}";
        $data[$this->primaryKey] = $id;
        return $this->executeQuery($sql, $data);
    }
    
    public function getAll(): array
    {
        try {
            $pdo = $this->getConnection();
            $stmt = $pdo->query("SELECT * FROM {$this->tableName}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getById(mixed $id): array
    {
        try {
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM {$this->tableName} WHERE {$this->primaryKey} = :{$this->primaryKey}");
            $stmt->execute([$this->primaryKey => $id]);
            $data =  $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}

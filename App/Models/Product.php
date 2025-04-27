<?php
declare(strict_types=1);
namespace RegisterProducts\App\Models;

class Product extends BaseModel
{
    protected array $columns = [
        "name",
        "description",
        "price",
        "brand"
    ];
    protected string $tableName = "products";
}
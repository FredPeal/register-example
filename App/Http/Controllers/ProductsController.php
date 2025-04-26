<?php
declare(strict_types=1);
namespace RegisterProducts\App\Http\Controllers;
use RegisterProducts\App\Models\Product;
class ProductsController
{
    public function index(): void
    {
        $productModel = new Product();
        $products = $productModel->getAll();
        require_once __DIR__ . '/../../Views/products/index.php';
    }

    public function create(): void
    {
        require_once __DIR__ . '/../../Views/products/form.php';
    }

    public function store(): void
    {
        $productModel = new Product();
        $data = $_POST;
        $productModel->save($data);
        header('Location: /products');
    }

    public function show(int $id): void
    {
        $productModel = new Product();
        $product = $productModel->getById($id);
        require_once __DIR__ . '/../../Views/products/show.php';
    }
    public function edit($id): void
    {
        $productModel = new Product();
        $product = $productModel->getById($id);
        require_once __DIR__ . '/../../Views/products/form.php';
    }
    public function update(int $id): void
    {
        $productModel = new Product();
        $data = $_POST;
        $productModel->update($id, $data);
        header('Location: /products');
    }
}

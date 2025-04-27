<?php
require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

try {
    $router->setNamespace('RegisterProducts\App\Http\Controllers');
    $router->get('/products', 'ProductsController@index');
    $router->get('/products/create', 'ProductsController@create');
    $router->post('/products', 'ProductsController@store');
    $router->get('/products/{id}/edit', 'ProductsController@edit');
    $router->post('/products/{id}', 'ProductsController@update');
    $router->delete('/products/{id}', 'ProductsController@destroy');
    
    $router->get('/auth/login', 'AuthController@login');
    $router->get('/auth/register', 'AuthController@register');

    $router->run();
} catch (\Throwable $e) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage()
    ]);
}

<?php
require __DIR__ . '/vendor/autoload.php';

$router = new \Bramus\Router\Router();

try {
    $router->setNamespace('RegisterProducts\App\Http\Controllers');
    $router->get('/products', 'ProductsController@index');
    $router->get('/products/create', 'ProductsController@create');
    // $router->get('/products/{id}', 'ProductsController@show');
    $router->post('/products', 'ProductsController@store');
    $router->get('/products/{id}/edit', 'ProductsController@edit');
    $router->post('/products/{id}', 'ProductsController@update');
    $router->delete('/products/{id}', 'ProductsController@destroy');
    $router->run();
} catch (\Throwable $e) {
    header('Content-Type: application/json; charset=utf-8');
    return json_encode([
        'error' => true,
        'message' => $e->getMessage()
    ]);
}

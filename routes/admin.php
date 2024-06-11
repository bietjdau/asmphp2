<?php


use Thanh\Asmphp2\Controllers\Admin\UserController;
use Thanh\Asmphp2\Controllers\Admin\ProductController;
use Thanh\Asmphp2\Controllers\Admin\DashboardController;
use Thanh\Asmphp2\Controllers\Admin\CategoryController;

// $router->before('GET|POST', '/admin/*.*', function() {
//     if (! isset($_SESSION['user'])) {
//         header('location: ' . url('login') );
//         exit();
//     }
// });


$router->mount('/admin', function () use ($router) {

    $router->get('/',                   DashboardController::class . '@dashboard');
    $router->get('/',                   CategoryController::class . '@dashboard');
    $router->get('/',                    UserController::class .'@user');
    $router->get('/',                    ProductController::class .'@product');

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserController::class . '@index');  // D;
        $router->get('/create',         UserController::class . '@create'); // Show form ;
        $router->post('/store',         UserController::class . '@store');  // Lưu mớ;
        $router->get('/{id}',           UserController::class . '@show');   // Xem ;
        $router->get('/{id}/edit',      UserController::class . '@edit');   // Show ;
        $router->post('/{id}/update',   UserController::class . '@update'); // Lưu sử;
        $router->post('/{id}/delete',   UserController::class . '@delete');
    });

    // CRUD categories
    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoryController::class . '@index');  
        $router->get('/create',         CategoryController::class . '@create'); 
        $router->post('/store',         CategoryController::class . '@store');  
        $router->get('/{id}',           CategoryController::class . '@show');   
        $router->get('/{id}/edit',      CategoryController::class . '@edit');   
        $router->post('/{id}/update',   CategoryController::class . '@update'); 
        $router->post('/{id}/delete',   CategoryController::class . '@delete');
    });
    // product
    $router->mount('/products', function () use ($router) {
        $router->get('/',               ProductController::class . '@index');  
        $router->get('/create',         ProductController::class . '@create'); 
        $router->post('/store',         ProductController::class . '@store');
        $router->get('/{id}',           ProductController::class . '@show');
        $router->get('/{id}/edit',      ProductController::class . '@edit');   
        $router->post('/{id}/update',   ProductController::class . '@update');
        $router->post('/{id}/delete',   ProductController::class . '@delete');
    });

    });
    


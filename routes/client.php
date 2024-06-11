<?php


use Thanh\Asmphp2\Controllers\Client\AboutController;
use Thanh\Asmphp2\Controllers\Client\ContactController;
use Thanh\Asmphp2\Controllers\Client\HomeController;
use Thanh\Asmphp2\Controllers\Client\ProductController;

$router->get( '/',                  HomeController::class       . '@index');
$router->get( '/about',             AboutController::class      . '@index');

$router->get( '/contact',           ContactController::class    . '@index');
$router->post( '/contact/store',    ContactController::class    . '@store');

$router->get( '/products',          ProductController::class    . '@index');
$router->get( '/products/{id}',     ProductController::class    . '@detail');

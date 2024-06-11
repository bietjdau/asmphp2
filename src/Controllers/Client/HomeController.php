<?php

namespace Thanh\Asmphp2\Controllers\Client;

use Thanh\Asmphp2\Commons\Controller;
use Thanh\Asmphp2\Commons\Helper;
use Thanh\Asmphp2\Models\Product;

class HomeController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    
    public function index() {
        $name = 'DucTV44';

        $products = $this->product->all();

        $this->renderViewClient('home', [
            'name' => $name,
            'products' => $products
        ]);
    }
}

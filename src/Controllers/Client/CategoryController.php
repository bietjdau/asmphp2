<?php 

namespace Thanh\Asmphp2\Controllers\Client;

use Thanh\Asmphp2\Commons\Controller;
// use Thanh\Asmphp2\Models\Product;
use Thanh\Asmphp2\Models\Category;

class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }
    
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function detail($id) {
        $category = $this->category->findByID($id);

        $this->renderViewClient('product-detail', [
            'category' => $category
        ]);
    }
}
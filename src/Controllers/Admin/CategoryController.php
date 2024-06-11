<?php

namespace Thanh\Asmphp2\Controllers\Admin;

use Thanh\Asmphp2\Commons\Controller;
use Thanh\Asmphp2\Commons\Helper;
use Thanh\Asmphp2\Models\Category;

use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $category = $this->category->all();

        $this->renderViewAdmin('categories.index', [
            'categories' => $category
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('categories.create', [
            'categoryPluck' => $categoryPluck
        ]);
    }

    public function store()
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'id'           => 'required',
            'name'         => 'required|max:100',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'id'            => $_POST['id'],
                'name'          => $_POST['name'],
            ];

            // if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

            //     $from = $_FILES['img_thumbnail']['tmp_name'];
            //     $to   = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

            //     if (move_uploaded_file($from, PATH_ROOT . $to)) {
            //         $data['img_thumbnail'] = $to;
            //     } else {
            //         $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';

            //         header('Location: ' . url('admin/products/create'));
            //         exit;
            //     }
            // }

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function show($id)
    {
        $categories = $this->category->findByID($id);

        $this->renderViewAdmin('categories.show', [
            'category' => $categories
        ]);
    }

    public function edit($id)
    {
        $categories = $this->category->findByID($id);
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('categories.edit', [
            'category' => $categories,
            'categoryPluck' => $categoryPluck,
        ]);
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);

        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'id'           => 'required',
            'name'                  => 'required|max:100',
            // 'overview'              => 'max:500',
            // 'content'               => 'max:65000',
            // 'img_thumbnail'         => 'uploaded_file:0,2048K,png,jpeg,jpg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/$id/edit"));
            exit;
        } else {
            $data = [
                'id'            => $_POST['id'],
                'name'          => $_POST['name'],
                // 'overview'      => $_POST['overview'],
                // 'content'       => $_POST['content'],
                // 'updated_at'    => date('Y-m-d H:i:s')
            ];

            // if (!empty($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['size'] > 0) {

            //     $from = $_FILES['img_thumbnail']['tmp_name'];
            //     $to   = 'assets/uploads/' . time() . $_FILES['img_thumbnail']['name'];

            //     if (move_uploaded_file($from, PATH_ROOT . $to)) {
            //         $data['img_thumbnail'] = $to;
            //     } else {
            //         $_SESSION['errors']['img_thumbnail'] = 'Upload KHÔNG thành công!';

            //         header('Location: ' . url("admin/products/$id/edit"));
            //         exit;
            //     }
            // }

            $this->category->update($id, $data);

            // if ($product['img_thumbnail'] && file_exists( PATH_ROOT . $product['img_thumbnail'] ) ) {
            //     unlink(PATH_ROOT . $product['img_thumbnail']);
            // }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url("admin/categories/$id/edit"));
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $category = $this->category->findByID($id);

            $this->category->delete($id);

            // if ($product['img_thumbnail'] && file_exists( PATH_ROOT . $product['img_thumbnail'] ) ) {
            //     unlink(PATH_ROOT . $product['img_thumbnail']);
            // }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/categories'));
        exit();
    }
}
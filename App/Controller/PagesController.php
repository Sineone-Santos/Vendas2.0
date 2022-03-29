<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Products;
use system\Request;

class PagesController
{

    public function home()
    {
    }
    public function about()
    {
        echo 'About';
    }
    public function logout()
    {
        session_destroy();
        redirect('/auth/login');
    }
    public function contacts()
    {
        echo 'contatos';
    }
    public function login()
    {
        $content = [
            'page' => view('login')
        ];
        echo view('template/template', $content);
    }
    public function register()
    {
        $content = [
            'page' => view('register')
        ];
        echo view('template/template', $content);
    }
    public function admin()
    {
        $content = [
            'templateAdmin' => view('template/template-admin'),
            'page' => view('dashboard')
        ];
        echo view('template/template', $content);
    }
    public function produtosCategory()
    {
        $obj = new Category();
        $list = $obj->listCategory();
        $content = [
            'page' => view('produtos-categoria', ['lista' => $list]),
            'templateAdmin' => view('template/template-admin')
        ];
        echo view('template/template', $content);
    }
    public function productsList(Request $req)
    {   
        $id_category = $req->get('id_categoria');
        $productsModel = new Products();

        $list = $productsModel->listProducts($id_category);
        $categoryModel = new Category();
        $listCategory =  $categoryModel->listCategory();

        $content = [
            'page' => view('produtos-lista', [
                'lista' => $list,
                'listCategory' => $listCategory               
            ]),
            'templateAdmin' => view('template/template-admin'),
        ];
        echo view('template/template', $content);
    }
    public function ProductsRegister(Request $req){
        $categoryModel = new Category();
        $listCategory =  $categoryModel->listCategory();

        $idProduct = $req->get('id');
        if($idProduct){
            $productsModel = new Products();
            $showProduct = $productsModel->getProduct($idProduct); 
        }

        $content = [
            'page' => view('produtos-cadastro', [
                'product' => $showProduct ?? null,
                'listCategory' => $listCategory            
            ]),
            'templateAdmin' => view('template/template-admin'),
        ];
        echo view('template/template', $content);
    }
}

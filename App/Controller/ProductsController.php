<?php

namespace App\Controller;

use App\Model\Products;
use system\Request;
use App\Model\Category;

class ProductsController
{
    public function saveProducts(Request $req)
    {
        $erros = [];
        $id = $req->get('idProduct');
        $img = $_FILES['img'] ?? null;
        $uploadPath = '\\produtos_img\\';

        $productsModel = new Products();
        $list = [
            'category_id' => $req->get('id_category'),
            'name' => $req->get('name'),
        ];
        if ($img){
            if ($img['error'] == 4) {             
                if(!$id) {
                    $erros['img'][] = 'É nescessário adicionar uma imagem';
                }
            }else{
                $file = pathinfo($_FILES['img']['name']);
                $fileName = md5($file['filename'] . time());
                $fileExtension = strtolower($file['extension']);
                $newDirFile = PATH_ROOT . $uploadPath . $fileName . '.' . $fileExtension;

                if ($img['size'] > 5e+6) {
                    $erros['img'][] = 'o arquivo dever ser menor que 5M';
                }
                if (!in_array($fileExtension, ['jpeg', 'jpg'])) {
                    $erros['img'][] = 'a imagem deve ser apenas JPEG';
                }
                $list['img'] = $fileName . '.' . $fileExtension;   
            }
            
                   
        }else{
            $erros['img'][] = 'voce removeu input';
            
        }
        if ($id) {
            $categoryModel = new Category();
            $userID = $categoryModel->listCategory();
            $productsModel->updateProduct($id, $list, $userID[0]['USER_ID']);
        }

         
        if (strlen($list['name']) > 20 || strlen($list['name']) < 4) {
            $erros['name'] = 'campo invalido, deve conter entre 4 e 20 caracteres';
        }

        if (count($erros) > 0) {
            $_SESSION['erros'] = $erros;
            $_SESSION['old']  = $list;
            redirect('/admin/produtos-cadastro');
        }
        if (count($erros) == 0) {
            if (move_uploaded_file($_FILES['img']['tmp_name'], $newDirFile)) {
                $productsModel->insertProducts($list);
                redirect('/admin/produtos-cadastro');
            } else {
                $erros['upload'] = 'erro no Upload, entre em contato com o suporte';
                $_SESSION['erros']  = $erros;
                redirect('/admin/produtos-cadastro');
            }
        }
    }
    public function deleteProducts(Request $req)
    {
        $id = $req->get('id');
        if ($id) {
            $obj = new Products();
            $obj->deleteProducts($id);
        } else {
            http_response_code(400);
            echo 'Erro ao excluir a categoria';
        }
    }
    public function showProduct()
    {
    }
}

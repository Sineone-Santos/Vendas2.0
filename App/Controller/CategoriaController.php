<?php

namespace App\Controller;

use App\Model\Category;
use App\Model\Products;
use system\Request;

class CategoriaController
{
    public function insertCategory(Request $req)
    {
        $list = [
            'descricao' => $req->get('descricao'),
        ];
       
        $erros = [];
        if(strlen($list['descricao']) > 20 || strlen($list['descricao']) < 4){
            $erros['descricao'] = 'campo invalido, deve conter entre 4 e 20 caracteres';
        }
        if(count($erros) == 0){
            $obj = new Category();
            $obj->insertCategory($list);
            redirect('/admin/produtos-categoria');
            
        }
        if(count($erros) > 0){
            $_SESSION['erros'] = $erros;
            $_SESSION['old'] = $list;
            redirect('/admin/produtos-categoria');
        }
    }
    public function deleteCategory(Request $req)
    {   
        $id = $req->get('id');       
        if($id){
            $obj= new Products();
            $obj->deleteProducts($id);
        } else {
            http_response_code(400);
            echo 'Erro ao excluir a categoria';
        }
    }
}
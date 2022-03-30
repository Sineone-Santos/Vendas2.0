<?php

namespace App\Controller;

use system\Request;
use App\Model\ModelProducts;

class Products
{
    public function index()
    {
        $model = new ModelProducts();
        $response = $model->findAllProducts();
        json($response);
    }
    
    public function deleteProduct(Request $req)
    {
        $id = $req->get('id');
        if ($id) {
            $obj = new Products();
            $obj->deleteProduct($id);
        } else {
            http_response_code(400);
            echo 'Erro ao excluir a categoria';
        }
    }
    public function insertProduct(Request $req)
    {
        $erros = [];
        $list = [
            'NOME'    => $req->get('NAME'),
            'ESTOQUE' => $req->get('ESTOQUE') ?: 0,
            'VALOR'   => $req->get('VALOR') ?: 0
        ];

        if(strlen($list['NOME']) <= 3 || strlen($list['NOME']) >= 70){
            $erros['NOME'] = 'O nome do produto deve conter entre 0 e 70 caracteres';
        }

        if(count($erros) > 0){
            json(['erros'=> $erros], 400);
        }
        if(count($erros) == 0){
            $modal = new ModelProducts();
            $modal->insertProducts($list);
            json(['msg'=> 'Produto cadatrado com Sucesso'], 201);
        }
    }
    
}

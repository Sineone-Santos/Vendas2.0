<?php

namespace App\Controller;

use System\Request;
use App\Model\ModelCheckout;

class Checkout
{
    public function venda(Request $req){

        $userID = user();
        // tipos de status
        //PE - pendente de pagamento
        //CE - cancelado
        //PA - pagamento aprovando, aguardando envio
        //PEV - Pedido enviado


        $erros = [];
         $list = [
             'USER_ID' => $userID['ID'],
             'FORMAPAGAMENTO' => $req->get('formaPagamento'),
             'PARCELAS' => $req->get('parcelas')
         ];
        if($list['FORMAPAGAMENTO'] != 'CT'){
            $list['STATUS'] = 'PE';
        }else{
            $list['STATUS'] = 'PA';
        }

        if(count($erros) == 0){
            $modelCheckout = new ModelCheckout();
            $modelCheckout->venda($list);
            json(['result'=> 'sucess']);

        }else{
            http_response_code(400);
            json(['erros'=> $erros]);
        }
    }
}
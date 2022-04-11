<?php

namespace App\Model;

date_default_timezone_set('america/sao_paulo');

class ModelCheckout
{

    public function venda($list)
    {
        $id = maxId('VENDAS');
        $data = date('d/m/y');
        $sql = 'insert into VENDAS (ID, USUARIO_ID, DATA_VENDA, FORMA_PAGAMENTO, PARCELAS, STATUS)
                values (?, ?, ?, ?, ?, ?)';
        $sth = prepareSql($sql);
        $sth->execute([$id, $list['USER_ID'], $data, $list['FORMAPAGAMENTO'], $list['PARCELAS'], $list['STATUS']]);
        $sth->fetch();
    }
}
<?php

namespace App\Model;

class Users
{

    public function findByEmail($email)
    {
        $sql = 'select * from USUARIOS x
                where x.email = ?';  
        $sth = prepareSql($sql);
        $sth->execute([$email]);
        $result = $sth->fetch();
        return $result;
    }
    public function insertClient($list){

        $id = maxID('USUARIOS');
        $sql = 'insert into usuarios(ID, NAME, EMAIL, PASSWORD, TIPO_DE_USUARIO, CEP, UF, 
                CIDADE, BAIRRO, LOGRADOURO, NUMERO)
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $sth = prepareSql($sql);
        $sth->execute([
                $id, 
                $list['NAME'],
                $list['EMAIL'], 
                $list['PASSWORD'], 
                $list['TIPO_DE_USUARIO'],
                $list['CEP'],
                $list['UF'],
                $list['CIDADE'],
                $list['BAIRRO'],
                $list['LOGRADOURO'],
                $list['NUMERO'],
            ]);
        return $id;
    }
    public function find($id){
        $sql = 'select * from USUARIOS x
                where x.id = ?';    
        $sth = prepareSql($sql);
        $sth->execute([$id]);
        $result = $sth->fetch();
        return $result;
    }
}


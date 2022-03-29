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
    public function insertUser($list){

        $currentDate = dateNow();
        $id = maxID('USUARIOS');
        $sql = 'insert into usuarios(ID, NAME, EMAIL, PASSWORD, TIPO_DE_CADASTRO, CEP, UF, 
                CIDADE, BAIRRO, LOGRADOURO, NUMERO)
                values (?, ?, ?, ?, ?)';
        $sth = prepareSql($sql);
        $sth->execute([$id, $list['name'],$list['email'], $list['password'], $currentDate]);
        return $sth->fetch();
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


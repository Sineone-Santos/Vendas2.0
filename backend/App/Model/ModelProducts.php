<?php

namespace App\Model;

use System\QueryBuilder;

class ModelProducts
{
    public function findAllProducts()
    {
        $sql = 'select * from produtos';
        $sth = prepareSql($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
    public function insertProducts($list)
    {
        $id = maxId('PRODUTOS');
        $sql = 'insert into PRODUTOS(ID, NOME, VALOR, ESTOQUE)
                values (?, ?, ?, ?)';
        $sth = prepareSql($sql);
        $sth->execute([
            $id,
            $list['NOME'],
            $list['ESTOQUE'],
            $list['VALOR']
        ]);
        return $sth->fetch();
    }
    public function deleteProducts($id)
    {
        if ($this->getProduct($id)) {
            $sql = 'delete from products x
                    where x.id = ?';
            $sth = prepareSql($sql);
            $sth->execute([$id]);
            $result = $sth->fetch();
            return $result;
        }
    }

    public function getProduct($id = null)
    {
        $userID = $_SESSION['userID'];
        $sql = 'select 
                     p.id,
                     p.category_id,
                     p.name
                from category c inner join
                products p on c.id = p.category_id
                where c.user_id = ? and p.id = ?';
        $sth = prepareSql($sql);
        $sth->execute([$userID, $id]);
        $result = $sth->fetch();
        return $result;
    }
    public function updateProduct($id, $list, $userID)
    {
        $qbr = new QueryBuilder();
        $qbr->table('products')
            ->where('ID', $id)
            ->where('user_id', $userID);
        $qbr->update($list);
        
    }
}

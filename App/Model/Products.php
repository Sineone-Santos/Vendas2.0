<?php

namespace App\Model;

use System\QueryBuilder;

class Products
{
    public function listProducts($idCategory = null, $idProduto = null)
    {
        $params = [$_SESSION['userID']];

        $sql = 'select 
                    p.id,
                    p.category_id,
                    p.name
                from category c inner join
                products p on c.id = p.category_id
                where c.user_id = ?' ;
        if($idCategory){
            $sql .= ' and p.category_id = ?';
            $params[] = $idCategory;
        }
        $sql .= 'order by 1, 2';
        $sth = prepareSql($sql);
        $sth->execute($params);
        $result = $sth->fetchAll();
        return $result;
    }
    public function insertProducts($list)
    {
        $id = maxId('products');
        $currentDate = dateNow();
        $sql = 'insert into products(ID, NAME, CATEGORY_ID, IMG, CREATED_AT)
                values (?, ?, ?, ?, ?)';
        $sth = prepareSql($sql);
        $sth->execute([
            $id,
            $list['name'],
            $list['id_category'],
            $list['img'],
            $currentDate
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

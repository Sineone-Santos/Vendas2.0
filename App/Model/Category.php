<?php

namespace App\Model;

class Category
{
    public function listCategory()
    {
        $userID = $_SESSION['userID'];
        $sql = 'select
                    c.id,
                    c.name,
                    c.user_id,
                    count(p.id) as totalprodutos
                from category c
                left join products p on c.id = p.category_id
                where
                    c.user_id = ?
                group by
                    1, 2, 3
                ';
        $sth = prepareSql($sql);
        $sth->execute([$userID]);
        $result = $sth->fetchAll();
        return $result;
    }
    public function insertCategory($list)
    {
        $userID = $_SESSION['userID'];
        $id = maxId('category');
        $currentDate = dateNow();
        $sql = 'insert into category(ID, USER_ID, NAME, CREATED_AT)
                values (?, ?, ?, ?)';
        $sth = prepareSql($sql);
        $sth->execute([$id, $userID, $list['descricao'], $currentDate]);
        return $sth->fetch();
    }
    public  function deleteCategory($id)
    {
        $userID = $_SESSION['userID'];
        $sql = 'delete from category x
                where x.id = ? and x.user_id = ?';
        $sth = prepareSql($sql);
        $sth->execute([$id, $userID]);
        $result = $sth->fetchAll();
        return $result;
    }
}

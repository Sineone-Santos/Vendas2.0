<?php 

namespace System;

use Exception;

class QueryBuilder{
    
    protected $table;
    protected $where = [];
    protected $param = [];

    public function table($table):QueryBuilder
    {
        $this->table = $table;
        return $this;
    }
    public function insert($list){

        $list['ID'] = maxId($this->table);
        $placeholder = str_repeat('?, ', count($list));
        $fields = implode(', ', array_keys($list));  
        $sql =  'insert into '.$this->table.' ('.$fields.') 
                 values ('.substr($placeholder, 0, -2).')';
        $sth = prepareSql($sql);
        $sth->execute(array_values($list));
        return $list['ID'];
       
    }
    public function where($field, $value):QueryBuilder
    {
        $this->where[] = $field.' = ?';
        $this->params[] = $value;
        return $this;
    }
    public function getWhere()
    {
        return count($this->where) > 0 ? ' where '.implode(' and ', $this->where) : '';
    }

    public function update($list) 
    {      
        $where = $this->getWhere();
        if(!$where){
            throw new Exception('sem condição');
        }
        $params = array_merge(array_values($list), $this->params);
        $sql = 'update '.$this->table.' set '.implode(', ', array_map(function($key){
            return $key.' = ?';
         },array_keys($list))).$this->getWhere();
        $sth = prepareSql($sql);
        $sth->execute($params);
        
    }
    public function inner(){

    }
}
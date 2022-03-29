<?php

$config = require '../config.php';
require '../vendor/autoload.php';
define('CONFIG', $config);

use System\QueryBuilder;


$qbr = new QueryBuilder();

$list = [
    'NAME' => 'TESTEQBR',
    'CATEGORY_ID'=> 1,
    'IMG' => 'dsfnsafnsdnfsadkldfn.jpeg',
    'CREATED_AT' => dateNow()
];

// $qbr->insert($list);
$qbr->table('products')
    ->where('ID', 1);

try{
    $qbr->update($list);
}catch(Exception $e){
    echo $e->getMessage().' por que felipe errou';
}


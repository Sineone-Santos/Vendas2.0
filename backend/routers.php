<?php 

$router->post('/auth/login', 'User@login');
$router->post('/auth/register', 'User@registerClient');
$router->get('/products', 'Products@index');
$router->get('/', 'Products@index');
$router->post('/admin/product', 'Products@insertProduct');
$router->post('/user/checkout', 'Checkout@registerSell');
$router->post('/user', 'User@update');
$router->get('/user', 'User@show');
$router->post('/user/basket', 'User@itemsBasket');






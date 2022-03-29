<?php 

$router->post('/auth/login', 'User@login');
$router->get('/admin/myuser', 'User@getDadosUser');



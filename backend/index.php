<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use System\Router;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

$config = require 'config.php';
require 'vendor/autoload.php';


define('CONFIG', $config);
define('BASE_URL', $config['base_url']);
define('PATH_ROOT', __DIR__);

$router = new Router();
require 'routers.php';

$router->midleware('/admin', function () {
    $headers = apache_request_headers();
    $token = '';
    foreach ($headers as $header => $value) {
        if($header == 'Authorization'){
            $token = $value;
        }
    }
    try{
        if($token && preg_match('/^Bearer (.+)/', $token, $match)) {
            $token = $match[1];
            $decode = JWT::decode($token, new Key(CONFIG['jwt_key'], 'HS256'));
    
            $GLOBALS['user_id'] = $decode->sub;
            if(!user() || user('TIPO_DE_USUARIO') != 'A') {
                json(['msg'=> 'Usuario Não autorizado'], 401);
            }
        } else {
            json(['msg'=> 'alterando  o token'], 401);
        }
    }catch(Exception $e){
        echo $e->getMessage();
        http_response_code(401);
        exit;
    }
});
$router->midleware('/user', function () {
    $headers = apache_request_headers();
    $token = '';
    foreach ($headers as $header => $value) {
        if($header == 'Authorization'){
            $token = $value;
        }
    }
    try{
        if($token && preg_match('/^Bearer (.+)/', $token, $match)) {
            $token = $match[1];
            $decode = JWT::decode($token, new Key(CONFIG['jwt_key'], 'HS256'));
    
            $GLOBALS['user_id'] = $decode->sub;
            if(!user()) {
                json(['msg'=> 'Usuario Não autorizado'], 401);
            }
        } else {
            json(['msg'=> 'alterando  o token'], 401);
        }
    }catch(Exception $e){
        echo $e->getMessage();
        http_response_code(401);
        exit;
    }
});
$router->run();

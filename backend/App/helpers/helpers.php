<?php

use Firebase\JWT\JWT;
use System\ConnectDB;

function view($filename, $params = []) {
    $params = array_merge([
        'erros' => $GLOBALS['erros'], 
        'old' => $GLOBALS['old']
    ], $params);
    foreach($params as $key => $value) {
        $$key = $value;
    }
    ob_start();
    require 'views/'.$filename.'.php';
    return ob_get_clean();
}
function redirect($r){
    header('location: '.BASE_URL.$r);
    exit;
}
function dateNow(){
    return date("m/d/y h:i:s");
}
function con()
{
    return ConnectDB::con();       
}
function prepareSql($sql)
{   
    try{
        return con()->prepare($sql);
    }catch(Exception $e){
        json(['erro'=> $e->getMessage()], 500);
    }

}
function maxId(string $table){
    $sql = 'select max(ID) as ID from '.$table;
    $sth = prepareSql($sql);
    $sth->execute();
    return $sth->fetch()['ID'] + 1;
}
function gerarToken($user_id){
    $key = CONFIG['jwt_key'];
    $payload = array(
        "iss" => "localhost",
        "sub" => $user_id,
        "exp" => time() + 1000
    );
    return JWT::encode($payload, $key, 'HS256');
}
function json($payload, $statusCode = 200){
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($payload);
    exit;
}

function user($key = null)
{	 
	if(isset($GLOBALS['user_id']) && !isset($GLOBALS['user'])){
        $GLOBALS['user'] = (new \App\Model\Users())->find($GLOBALS['user_id']);
	}

	return $key ? ($GLOBALS['user'][$key] ?? null) : ($GLOBALS['user'] ?? null);
}

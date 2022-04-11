<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function gerarToken($user_id){
    $key = CONFIG['jwt_key'];
    $payload = array(
        "iss" => "localhost",
        "sub" => $user_id,
    );
    return JWT::encode($payload, $key, 'HS256');
}

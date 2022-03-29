<?php

namespace App\Controller;

use System\Request;
use App\Model\Users;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class User
{

    public function login(Request $req)
    {
        $pass  = $req->get("PASSWORD");
        $email = $req->get('EMAIL');
        $obj   = new Users();
        $user  = $obj->findByEmail($email);
        if (!$user) {
            $_SESSION['msg'] = 'Dados Invalidos!';
            $_SESSION['EMAIL'] = $email;
            //redirect('/auth/login');
        }

        if (password_verify($pass, $user['SENHA'])) {
            $key = "123456";
            $payload = array(
                "iss" => "localhost",
                "sub" => $user['ID'],
                "exp" => time() + 1000
            );
            $jwt = JWT::encode($payload, $key, 'HS256');
            //$_SESSION['userID'] = $user['ID'];
            //$_SESSION['dadosUser'] = $user;
            json($jwt);
        } else {
            http_response_code(400);
            $_SESSION['msg'] = 'Dados Invalidos!!';
            $_SESSION['EMAIL'] = $email;
            //redirect('/auth/login');

        }
    }
    public function insertUser(Request $req)
    {
        $list = [
            'EMAIL'     => $req->get('EMAIL'),
            'PASSWORD'  => password_hash($req->get('PASSWORD'), PASSWORD_BCRYPT),
            'NAME'      => $req->get('NAME'),
            'TYPE_USER' => $req->get('TYPE_USER'),
            'CEP'       => $req->get('CEP'),
            'UF'        => $req->get('UF'),
            'CIDADE'    => $req->get('CIDADE'),
            'BAIRRO'    => $req->get('BAIRRO'),
            'LOGRADOURO' => $req->get('LOGRADOURO'),
            'NUMERO'    => $req->get('NUMERO'),
        ];
        $erros = [];

        if (strlen($req->get('password')) <= 3) {
            $erros['PASSWORD'] = 'a senha deve conter mais de 4 digitos';
        }
        if (strlen($req->get('name')) >= 50 || strlen($req->get('name')) <= 5) {
            $erros['NAME'] = 'o nome deve possuir entre 6 e 49 caracteres';
        }
        if (!filter_var($req->get('email'), FILTER_VALIDATE_EMAIL)) {
            $erros['EMAIL'] = 'formato de email invalido';
        }
        if (count($erros) == 0) {
            $obj   = new Users();
            $user  = $obj->findByEmail($list['EMAIL']);
            if (!$user) {

                $obj->insertUser($list);
                redirect('/auth/login');
            } else {
                $erros['EMAIL'] = 'Email ja cadastrado';
            }
        }
        if (count($erros) > 0) {
            $_SESSION['erros'] = $erros;
            $_SESSION['old'] = $list;
            redirect('/auth/register');
        }
    }
    public function getDadosUser(Request $req)
    {
        json([
            'user'=> user()
        ]);
        
    }
}

// if(user('active') == 'S') {
//     if(user('account_type') == 'client') {

//     } else if(user('account_type') == 'admnin') {

//     }
// } else {
//     redirect('auth/login');
// }
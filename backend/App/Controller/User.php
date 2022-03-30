<?php

namespace App\Controller;

use System\Request;
use App\Model\Users;

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
        }

        if (password_verify($pass, $user['PASSWORD'])) {
            $token = gerarToken($user['ID']);
            json(['token'=> $token]);
        } else {
            http_response_code(400);
            $_SESSION['msg'] = 'Dados Invalidos!!';
            $_SESSION['EMAIL'] = $email;

        }
    }
    public function registerClient(Request $req)
    {
        $list = [
            'EMAIL'            => $req->get('EMAIL'),
            'PASSWORD'         => password_hash($req->get('PASSWORD'), PASSWORD_BCRYPT),
            'NAME'             => $req->get('NAME'),
            'TIPO_DE_USUARIO'  => 'C',
            'CEP'              => $req->get('CEP'),
            'UF'               => $req->get('UF'),
            'CIDADE'           => $req->get('CIDADE'),
            'BAIRRO'           => $req->get('BAIRRO'),
            'LOGRADOURO'       => $req->get('LOGRADOURO'),
            'NUMERO'           => $req->get('NUMERO'),
        ];
        $erros = [];

        if (strlen($req->get('PASSWORD')) <= 3) {
            $erros['PASSWORD'] = 'a senha deve conter mais de 4 digitos';
        }
        if (strlen($req->get('NAME')) >= 50 || strlen($req->get('NAME')) <= 5) {
            $erros['NAME'] = 'o nome deve possuir entre 6 e 49 caracteres';
        }
        if (!filter_var($req->get('EMAIL'), FILTER_VALIDATE_EMAIL)) {
            $erros['EMAIL'] = 'formato de email invalido';
        }
        
        if (count($erros) == 0) {
            $obj   = new Users();
            $user  = $obj->findByEmail($list['EMAIL']);
            if (!$user) {
                $id = $obj->insertClient($list);
                $token = gerarToken($id);
                json(['token'=> $token]);
            } else {
                $erros['EMAIL'] = 'Email ja cadastrado';
            }
        }
        if (count($erros) > 0) {
            json(['erros'=>$erros], 400);
        }
    }
}

// if(user('active') == 'S') {
//     if(user('account_type') == 'client') {

//     } else if(user('account_type') == 'admnin') {

//     }
// } else {
//     redirect('auth/login');
// }
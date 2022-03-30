<?php

namespace system;

class Request{

    private $param = [];

    public function __construct()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if($method == 'GET'){

            $this->param = $_GET;

        }else{
            if(count($_POST) == 0){
                $content = file_get_contents('php//input');
                if($content){
                    $this->param = json_decode($content, true);
                }
            }else{
                $this->param = $_POST;
            }
        }
    }
    public function get($key){
        return $this->param[$key] ?? null;
    }
}
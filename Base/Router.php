<?php

namespace system;

use System\Request;

class Router{

    private $method;
    private $currentPath;
    private $midleForExecute = [];
    private $typeRouter = [
        'GET' => [],
        'POST'=> []
    ];

    public function __construct()
    {
        $path = strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $this->currentPath = str_replace(BASE_URL, '', $path);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }
    public function get($path, $callback)
    {
        $this->typeRouter['GET'][$path] = $callback; 
    }
    public function post($path, $callback)
    {
        $this->typeRouter['POST'][$path] = $callback;
    }
    public function midleware($path, $callback){
        $verify = str_replace('/','\/',$path);
        if(preg_match("/^$verify/", $this->currentPath)){
            $this->midleForExecute[] = $callback;
        }
    }
    public function run()
    {
        
        $req = new Request();
        $router = $this->currentPath;

        if(isset($this->typeRouter[$this->method][$router])){
            foreach($this->midleForExecute as $midle){
                $midle();
            }
            $controller = explode('@', $this->typeRouter[$this->method][$router]);
            $className = "App\\Controller\\".$controller[0];
            $obj = new $className;
            call_user_func_array([$obj, $controller[1]], [$req]);
        }else{
            http_response_code(404);
        }
    }
}

<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../app/Config/app.php';
require __DIR__ . '/../app/Config/helpers.php';

$uri = $_SERVER['REQUEST_URI'];
$uri = str_replace('/public/', '', $uri);

$controller = CONTROLLER_PADRAO; //CONSTANTE DEFINIDO NO APP.PHP
$metodo = METODO_PADRAO; //CONSTANTE DEFINIDA NO APP.PH

if ($uri != '') { //verifica se existe algum valor em $uri
    $uri = explode('/', $uri); //converter a var $uri em um  array

    $controller = $uri[0]; //resecrever a variavel $controller

    if (isset($uri[1])) { //verificar se existe a posição 1 em $uri
        
        $metodo= explode('?',$uri[1])[0];
    }
}

if (is_file(__DIR__ . "/../app/Controllers/" . $controller . ".php")) {
    $controller = "Pizzaria\\Controllers\\" . ucfirst($controller); //ucfirst transforma a primeira letra em maiuscula
    $controllerExec = new $controller();

    if (method_exists($controllerExec, $metodo)) {
        $controllerExec->$metodo();
    }
} else {
    echo "Página não encontrada";
}

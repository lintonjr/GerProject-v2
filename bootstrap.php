<?php

require __DIR__.'/vendor/autoload.php';

$router = new GERP\Framework\Router;


$router->add('GET', '/', function(){
    return 'Estamos na homepage';
});

$router->add('GET', '/projects/(\d+)', function($params){
    return 'Estamos listando projetos do id: ' . $params[1];
});

try{
    echo $router->run();
} catch (\GERP\Framework\Exceptions\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}


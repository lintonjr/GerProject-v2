<?php

require __DIR__.'/vendor/autoload.php';

$router = new GERP\Framework\Router;

require __DIR__.'/config/containers.php';
require __DIR__.'/config/routes.php';

try{
    $result = $router->run();

    $response = new \GERP\Framework\Response;
    $params = [
        'container' => $container,
        'params' => $result['params'],
    ];
    $response($result['action'], $params);
} catch (\GERP\Framework\Exceptions\HttpException $e){
    echo json_encode(['error' => $e->getMessage()]);
}


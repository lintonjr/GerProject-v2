<?php
/**
 * Created by PhpStorm.
 * User: linto
 * Date: 16/08/2018
 * Time: 14:10
 */

namespace GERP\Framework;

use GERP\Framework\Response;
use GERP\Framework\Exceptions\HttpException;

class App
{
    private $router;
    private $container;
    private $middlewares = [
        'before' => [],
        'after' => [],
    ];

    public function __construct($router, $container)
    {
        $this->router = $router;
        $this->container = $container;
    }

    public function addMiddleware($on, $callback){
        $this->middlewares[$on][] = $callback;
    }

    public function run()
    {
        try{
            $result = $this->router->run();

            $response = new Response;
            $params = [
                'container' => $this->container,
                'params' => $result['params'],
            ];

            foreach ($this->middlewares['before'] as $middleware){
                $middleware($this->container);
            }

            $response($result['action'], $params);

            foreach ($this->middlewares['after'] as $middleware){
                $middleware($this->container);
            }

        } catch (HttpException $e){
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
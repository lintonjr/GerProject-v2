<?php

namespace GERP\Framework;

use GERP\Framework\Exceptions\HttpException;

class Router
{
    private $routes = [];

    public function add(string $method, string $pattern, $callback)
    {
        $method = strtolower($method);
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[$method][$pattern] = $callback;
    }

    public function run()
    {

        $url = $this->getCurrentUrl();
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (empty($this->routes[$method])){
            throw new HttpException('Pagina não encontrada', 404);
        }
        foreach ($this->routes[$method] as $route => $action) {
            if (preg_match($route, $url, $params)){
                return compact('action', 'params');
            }
        }

        if (array_key_exists($route, $this->routes)) {
            return $this->routes[$route]();
        }
        throw new HttpException('Pagina não encontrada', 404);
    }

    public function getCurrentUrl()
    {
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if (strlen($url) > 1){
            $url = rtrim($url, '/');
        }
        return $url;
    }
}
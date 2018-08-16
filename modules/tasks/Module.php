<?php

namespace GERP\Framework\Tasks;

use GERP\Framework\Modules\Contract;


class Module implements Contract
{
    public function getNamespaces() :array
    {
        return [
            'GERP\\Framework\\Tasks\\' => __DIR__ . '/src'
        ];
    }
    public function getContainerConfig() :string
    {
        return __DIR__ . '/config/containers.php';
    }
    public function getEventConfig() :string
    {
        return __DIR__ . '/config/events.php';
    }
    public function getMiddlewareConfig() :string
    {
        return __DIR__ . '/config/middlewares.php';
    }
    public function getRouteConfig() :string
    {
        return __DIR__ . '/config/routes.php';
    }
}
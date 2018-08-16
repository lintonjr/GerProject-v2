<?php
/**
 * Created by PhpStorm.
 * User: linto
 * Date: 16/08/2018
 * Time: 13:46
 */

namespace App\Events;


class UsersCreated
{
    public function __invoke($e)
    {
        // TODO: Implement __invoke() method.
        $event = $e->getName();
        $params = $e->getParams();
//        echo sprintf('Disparado event "%s", com parametros: "%s"', $params, json_encode($params));
    }
}
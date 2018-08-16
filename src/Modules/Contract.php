<?php
/**
 * Created by PhpStorm.
 * User: linto
 * Date: 16/08/2018
 * Time: 15:49
 */

namespace GERP\Framework\Modules;


interface Contract
{
    public function getNamespaces() :array;
    public function getContainerConfig() :string;
    public function getEventConfig() :string;
    public function getMiddlewareConfig() :string;
    public function getRouteConfig() :string;
}
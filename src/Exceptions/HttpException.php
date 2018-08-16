<?php
/**
 * Created by PhpStorm.
 * User: linto
 * Date: 16/08/2018
 * Time: 09:21
 */

namespace GERP\Framework\Exceptions;


class HttpException extends \Exception
{
    public function __construct($message, $code, \Exception $previous = null){
        \http_response_code($code);
        parent::__construct($message, $code, $previous);
    }
}
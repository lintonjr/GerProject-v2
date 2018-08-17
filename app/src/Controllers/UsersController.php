<?php


namespace App\Controllers;
use GERP\Framework\CrudController;

class UsersController extends CrudController
{

    protected function getModel(): string
    {
        // TODO: Implement getModel() method.
        return 'users_model';
    }

}
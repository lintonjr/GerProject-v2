<?php


namespace App\Controllers;
use App\Models\Users;

class UsersController
{
    public function show($container, $request)
    {
        $user = new Users($container);
        $data = $user->get($request->attributes->get(1));

        return 'meu nome é ' . $data['name'];
    }
}
<?php

$container['events'] = function (){
    return new Zend\EventManager\EventManager;
};

$container['settings'] = function () {
    return [
      'db' => [
          'dsn' => 'mysql:host=localhost;',
          'database' => 'ger_project',
          'username' => 'root',
          'password' => 'root',
          'options' => [
              \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
          ]
      ]
    ];
};

$container['db'] = function ($c){
    $dsn = $c['settings']['db']['dsn'] . 'dbname=' . $c['settings']['db']['database'];
    $username = $c['settings']['db']['username'];
    $password = $c['settings']['db']['password'];
    $options = $c['settings']['db']['options'];

    $pdo = new \PDO($dsn, $username, $password, $options);

    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $pdo;
};

$container['users_model'] = function ($container){
    return new \App\Models\Users($container);
};

return $container;
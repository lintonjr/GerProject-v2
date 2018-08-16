<?php

$app->addMiddleware('before', function($c){
    session_start();
});

$app->addMiddleware('before2', function($c){
    header('Content-Type: text/plain');
});

$app->addMiddleware('after', function($c){
    echo 'after';
});

$app->addMiddleware('after2', function($c){
    echo 'after2';
});
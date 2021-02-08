<?php

// http://127.0.0.1:8000/v1/url

$router->group(['prefix' => 'v1','namespace' => 'v1\Auth'], function() use ($router){
    $router->post('/register','RegisterController');
});


// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

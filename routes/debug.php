<?php
define("CONTROLLER_DEBUG","\Devtvn\Sociallumen\Http\Controllers\DebugController@");

/** @var Router $router */
use Laravel\Lumen\Routing\Router;

Route::group(["prefix"=>"debug"],function ($router){
    $router->get('check',CONTROLLER_DEBUG."checkDB");
    $router->get('test',CONTROLLER_DEBUG."test");
});

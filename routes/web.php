<?php

/** @var Router $router */
use Laravel\Lumen\Routing\Router;
Route::group(["middleware"=>"auth.verify"],function ($router){
    $router->get("verify",CONTROLLER_APP."verify");
});

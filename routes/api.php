<?php
define("CONTROLLER_CORE","\Devtvn\Sociallumen\Http\Controllers\CoreController@");
define("CONTROLLER_APP","\Devtvn\Sociallumen\Http\Controllers\AppController@");

/** @var Router $router */
use Laravel\Lumen\Routing\Router;


Route::group(["prefix" => "api/app", "middleware" => "refresh"], function ($router) {
    $router->post('refresh', CONTROLLER_APP."refresh");
});
Route::group(['prefix' => 'api', 'middleware' => 'global'], function ($router){
    $router->group(['prefix' => '{platform}'], function ($router){
        $router->post("generate-url",CONTROLLER_CORE."generateUrl");
    });
    $router->group(["middleware" => ['social.auth', 'core.shopify']], function ($router) {
        $router->get('handle/auth', CONTROLLER_CORE."handleAuth");
    });

    $router->group(["prefix" => "app"], function ($router) {
        $router->post('login', CONTROLLER_APP."login");
        $router->post('register', CONTROLLER_APP."register");
        $router->group(["middleware" => 'core'], function ($router) {
            $router->delete('delete', CONTROLLER_APP."delete");
            $router->get('info', CONTROLLER_APP."user");
            $router->post('info', CONTROLLER_APP."updateUser");
            $router->put('change-password', CONTROLLER_APP."changePassword");
        });
        $router->post('forgot-password', CONTROLLER_APP."reset");
        $router->post('re-send',CONTROLLER_APP."reSendLinkEmail");
    });
});
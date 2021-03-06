<?php

use App\Http\Middleware\AuthenticatePush;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api', 'middleware' => AuthenticatePush::class], function($router){
    $router->post('/push', 'PushController@store');
    $router->post('/push/auth', 'AuthorizationController@store');
});
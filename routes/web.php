<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return ["Hello hellllooooooo..!!!"];
});

$router->get('/home', function () {
    return view('layouts.master');
});

function random_strings($length_of_string)
{
  
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result), 
                       0, $length_of_string);
}

$router->get('/key', function(){
    return random_strings(32);
});

$router->get('/users', function () use ($router) {
    $results = app('db')->select("SELECT * FROM userr");
    return response()->json($results);
});

$router->get('/instansi', function () use ($router) {
    $results = app('db')->select("SELECT * FROM instansi");
    return response()->json($results);
});

$router->post('/register', 'UserController@register');
$router->post('/login','AuthController@login');


$router->group(['middleware' => 'auth'], function() use ($router){
    $router->post('/logout', 'AuthController@logout');
});

$router->get('/home', 'ExampleController@index'); 
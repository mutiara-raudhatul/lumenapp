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
    return ["Welcome Si Adu Application"];
});

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');    
$router->group(['middleware' => 'auth'], function() use ($router){
    $router->get('/detail/{id}', 'UserrController@show');
    $router->post('/logout', 'AuthController@logout');
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/users', 'UserrController@index');
    $router->post('/users', 'UserrController@store');
    $router->post('/users/{id}', 'UserrController@update');
    $router->delete('/users/{id}', 'UserrController@delete');

    $router->get('/instansi', 'InstansiController@index');
    $router->post('/instansi', 'InstansiController@store');
    $router->post('/instansi/{id}', 'InstansiController@update');
    $router->delete('/instansi/{id}', 'InstansiController@delete');

    $router->get('/pengaduan', 'PengaduanController@index');
    $router->post('/pengaduan', 'PengaduanController@store');
    $router->post('/pengaduan/{id}', 'PengaduanController@update');
    $router->delete('/pengaduan/{id}', 'PengaduanController@delete');

    $router->get('/edukasi', 'EdukasiController@index');
    $router->post('/edukasi', 'EdukasiController@store');
    $router->post('/edukasi/{id}', 'EdukasiController@update');
    $router->delete('/edukasi/{id}', 'EdukasiController@delete');

    $router->get('/feedback', 'FeedbackController@index');
    $router->post('/feedback', 'FeedbackController@store');
    $router->post('/feedback/{id}', 'FeedbackController@update');
    $router->delete('/feedback/{id}', 'FeedbackController@delete');

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

// $router->get('/key', function(){
//     return random_strings(32);
// });

// $router->get('/users', function () use ($router) {
//     $results = app('db')->select("SELECT * FROM userr");
//     return response()->json($results);
// });

// $router->get('/instansi', function () use ($router) {
//     $results = app('db')->select("SELECT * FROM instansi");
//     return response()->json($results);
// });

// $router->post('/register', 'UserController@register');
// $router->post('/login','AuthController@login');


// $router->group(['middleware' => 'auth'], function() use ($router){
//     $router->post('/logout', 'AuthController@logout');
// });

// $router->get('/home', 'ExampleController@index'); 


// --------------------------------------
// $router->get('/', function () use ($router) {

//     return $router->app->version();

// });



<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


\Route::get('/', function () {  return view('welcome');});
\Route::post('doLogin', array('uses' => 'LoginController@doLogin'));

\Route::get('/login', array('uses' => 'AuthController@getLogin'));
\Route::post('/login', array('uses' => 'AuthController@postLogin'));
\Route::get('/logout', array('uses' => 'AuthController@doLogout'));

\Route::get('/register', array('uses' => 'LoginController@register'));
\Route::post('/registerSubmit', array('uses' => 'LoginController@registerSubmit'));

\Route::get('/googleLogin', array('uses' => 'LoginController@googleLogin'));
\Route::get('/facebookLogin', array('uses' => 'LoginController@facebookLogin'));


\Route::get('/dashboard', array('middleware' => 'auth','uses' => 'DashboardController@getdashboard'));

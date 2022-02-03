<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'matches',
]);

Route::get('/matches13', [
    'uses' => 'HomeController@matches13',
    'as' => 'matches13',
]);

Route::get('/matches12', [
    'uses' => 'HomeController@matches12',
    'as' => 'matches12',
]);

Route::get('/matches10', [
    'uses' => 'HomeController@matches10',
    'as' => 'matches10',
]);

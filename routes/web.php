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

// Route::get('/', function () {
//     return view('welcome');
// // });
// Route::get('/','ToDos@index');
    Route::resource('/list','ToDos')->middleware('auth');
    Route::delete('todo/{id}', 'ToDos@destroy')->name('todo.destroy');
    Route::patch('todo/update/{id}', 'ToDos@update')->name('todo.update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

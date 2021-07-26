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
//     return view('auth/login');
// });
Route::get('/', function () {
        return view('auth/login');
    });
Route::get('/data/{user_id}/{value}' , 'PostController@updateval');
Auth::routes();
Route::get('editData' ,'PostController@edit')->name('edit');
Route::post('data/create' , 'PostController@update')->name('update');
// Route::post('data/create' , 'RegisterController')->name('reqister');

Route::post('registerData' ,'PostController@index')->name('reg');
Route::get('/home', 'PostController@index')->name('home');
Route::get('/welcome', 'PostController@test');

//Route::get('/home', 'HomeController@index')->name('home');

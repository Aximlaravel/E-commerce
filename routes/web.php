<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



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

Route::get('/login', function () {
    return view('login');
});
Route::view ('/register','register');
Route::post('/register','UserController@register')->name('register');
Route::get('/','ProductController@index')->name('index');
Route::post('/login','UserController@login')->name('login');
Route::get('/detail/{id}','ProductController@detail')->name('detail');
Route::get('/search','ProductController@search')->name('search');
Route::post('/add_to_cart','ProductController@addtocart')->name('addtocart');
Route::get('/logout','ProductController@logout')->name('logout');
Route::get('/cartlist','ProductController@cartlist')->name('cartlist');
Route::get('/removecart/{id}','ProductController@removecart')->name('removecart');
Route::get('/ordernow','ProductController@ordernow')->name('ordernow');
Route::post('/orderplace','ProductController@orderplace')->name('orderplace');
Route::get('/myorder','ProductController@myorder')->name('myorder');




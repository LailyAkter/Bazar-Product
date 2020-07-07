<?php

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




Route::get('/','HomeController@index');


Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/login','LoginController@index');
    Route::post('/login','LoginController@store');

    Route::get('/register','RegisterController@index');
    Route::post('/register','RegisterController@store');
});
Route::namespace('Admin')->prefix('admin')->middleware("admin")->group(function () {
    Route::resource('/dashboard', 'AdminController');
    Route::resource('/product', 'ProductController');
    Route::resource('/bazarname', 'BazarNameController');
    Route::resource('/bazarlocation', 'BazarLocationController');
    Route::resource('/price', 'PriceController');
    Route::resource('/allproduct', 'AllProductController');
    Route::get("/logout",'LoginController@logout');
});

Route::namespace('User')->prefix('user')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('/register','RegisterController@index');
    Route::post('/register','RegisterController@store');
    Route::get('/register/show/{id}','RegisterController@show');
    Route::post('/register/list','RegisterController@addlist');
    Route::get('/register/list','RegisterController@list');
});





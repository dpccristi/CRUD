<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------s-------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users',"UsersController@index");
Route::post('users/create',"UsersController@create");
Route::get('users/update/{edited_id}',"UsersController@update");
Route::post('users/update/{edited_id}',"UsersController@edit");
Route::get('users/remove/{remove_id}', "UsersController@delete");
Route::get('users/testpassword/{testpassword_id}','UsersController@testpassword');
Route::post('users/testpassword/{user_id}', 'UsersController@test');

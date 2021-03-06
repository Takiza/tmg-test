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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::get('/', 'AnimalController@index')->name('dashboard');
    Route::post('/users/{user}/animal_type', 'UserController@giveAnimal')->name('users.give_animal');

    Route::resource('animals', AnimalController::class);
    Route::resource('users', UserController::class);
});

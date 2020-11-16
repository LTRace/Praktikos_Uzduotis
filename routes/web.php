<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['auth', 'leader']], function () {

    Route::get('/sukurti-uzduoti','App\Http\Controllers\PageController@createDutyPage')->name('sukurti-uzduoti');

    Route::get('/redaguoti-uzduoti','App\Http\Controllers\PageController@editDutyPage')->name('redaguoti-uzduoti');

    Route::get('/istrinti-uzduoti','App\Http\Controllers\PageController@deleteDutyPage')->name('istrinti-uzduoti');

    Route::get('redaguoti-uzduoti/uzduoties-redagavimas/{id}','App\Http\Controllers\PageController@editDutyForm')->name('uzduoties-redagavimas');



    Route::get('/naikinti-uzduoti/{id}','App\Http\Controllers\LeaderController@destroyDuty')->name('naikinti-uzduoti');

    Route::post('redaguoti-uzduoti/uzduoties-redagavimas/paredaguoti/{id}','App\Http\Controllers\LeaderController@editDuty')->name('paredaguoti-uzduoti');

    Route::post('/issaugoti-uzduoti','App\Http\Controllers\LeaderController@storeDuty')->name('issaugoti-uzduoti');

});


Route::group(['middleware' => ['auth', 'worker']], function () {

    Route::get('/mano-uzduotys','App\Http\Controllers\PageController@myDutiesPage')->name('mano-uzduotys');

    Route::get('/mano-uzduotys/atlikti-uzduoti/{id}','App\Http\Controllers\WorkerController@completeDuty')->name('atlikti-uzduoti');


});

Route::get('/','App\Http\Controllers\PageController@index')->name('/');

Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

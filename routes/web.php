<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function(){
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

Route::group(['middleware' => ['auth', 'role:writer']], function(){
    Route::get('/dashboard/visitcreate', 'App\Http\Controllers\DashboardController@visitcreate')->name('dashboard.visitcreate');
});
Route::group(['middleware' => ['auth', 'role:writer']], function(){
    Route::post('/dashboard/visitcreate', 'App\Http\Controllers\DashboardController@insert')->name('dashboard.insert');
});
Route::group(['middleware' => ['auth',]], function(){
    Route::get('/dashboard/edit/{id}', 'App\Http\Controllers\DashboardController@edit')->name('dashboard.edit');
});
Route::group(['middleware' => ['auth']], function(){
    Route::post('/dashboard/edit/{id}', 'App\Http\Controllers\DashboardController@update')->name('dashboard.update');
});
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard/delete{id}', 'App\Http\Controllers\DashboardController@delete');
});
require __DIR__.'/auth.php';
<?php

use GuzzleHttp\Middleware;
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
Route::get('/test', function() {
    $user = App\User::first();
    return $user->createToken('auth_token')->plainTextToken;
});
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'/task', 'as' => 'task.','Middleware' => ['auth']],function(){

    Route::get('/', 'TaskController@index')->name('index');
    Route::get('/create', 'TaskController@create')->name('create');
    Route::post('/create', 'TaskController@store')->name('create');
    Route::get('/edit/{id}', 'TaskController@edit')->name('edit');
    Route::post('/edit/{id}', 'TaskController@update')->name('edit');

    });

    Route::group(['prefix'=>'/label', 'as' => 'label.','Middleware' => ['auth']],function(){

        Route::get('/create', 'LabelController@create')->name('create');
        Route::post('/create', 'LabelController@store')->name('create');

        });


Auth::routes();

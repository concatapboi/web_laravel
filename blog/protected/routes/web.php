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
Route::get('/test', function () {
    return view('test');
});
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::group(['middleware' => ['web'],'module'=>'Backend','namespace'=>'App\Modules\Backend\Controllers'], function(){
// 	Route::get('/login', [
//         'as'=>'dang-nhap',
//         'uses'=>'AuthController@getLogin'
//     ]);
//     Route::post('/login', [
//         'as'=>'dang-nhap',
//         'uses'=>'AuthController@postLogin'
//     ]);

// });
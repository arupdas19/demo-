<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('student1','StudentController@add')->middleware('cors');
Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');
Route::post('student1','StudentController@add');
Route::middleware('auth:api')->group(function () {
    Route::post('getdetails', 'PassportController@getDetails');
 
    
});

Route::post('apicheck', 'StudentController@add');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::post('student1','StudentController@add');
Route::resource('student','StudentController');

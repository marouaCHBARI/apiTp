<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api'], function () {
    Route::get('articles','App\Http\Controllers\ArticlesController@index');
    Route::get('articles/{id}','App\Http\Controllers\ArticlesController@show');
    Route::post('articles', 'App\Http\Controllers\ArticlesController@store');
    Route::put('articles/{id}','App\Http\Controllers\ArticlesController@update');
    Route::delete('articles/{id}','App\Http\Controllers\ArticlesController@destroy');

    Route::get('comments','App\Http\Controllers\CommentController@index');
    Route::get('comments/{id}','App\Http\Controllers\CommentController@show');
    Route::post('comments', 'App\Http\Controllers\CommentController@store');
    Route::put('comments/{id}','App\Http\Controllers\CommentController@update');
    Route::delete('comments/{id}','App\Http\Controllers\CommentController@destroy');
});


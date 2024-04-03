<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'api'], function () {
    Route::get('articles','App\Http\Controllers\ArticlesController@index');
    Route::get('articles/{id}','App\Http\Controllers\ArticlesController@show');
    Route::post('articles', 'App\Http\Controllers\ArticlesController@store');
    Route::put('articles/{id}','App\Http\Controllers\ArticlesController@update');
    Route::delete('articles/{id}','App\Http\Controllers\ArticlesController@destroy');

    Route::get('articles/{id}/comments','App\Http\Controllers\CommentController@index');
    Route::get('articles/{id}/comments/{id}','App\Http\Controllers\CommentController@show');
    Route::post('articles/{id}/comments', 'App\Http\Controllers\CommentController@store');
    Route::put('articles/{id}/comments/{id}','App\Http\Controllers\CommentController@update');
    Route::delete('articles/{id}/comments/{id}','App\Http\Controllers\CommentController@destroy');
});


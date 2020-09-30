<?php

use Illuminate\Support\Facades\Route;

Route::get('/index','App\Http\Controllers\PostController@index')->name('index');
Route::post('/store','App\Http\Controllers\PostController@store')->name('store');

Route::get('/search/id','App\Http\Controllers\PostController@searchId')->name('searchId');
Route::post('/search/id','App\Http\Controllers\PostController@searchId')->name('searchId');
Route::post('/search/date','App\Http\Controllers\PostController@searchDate')->name('searchDate');
Route::post('/delete','App\Http\Controllers\PostController@deleteId')->name('deleteId');
Route::post('/update','App\Http\Controllers\PostController@updateId')->name('updateId');

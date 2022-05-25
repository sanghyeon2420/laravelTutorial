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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('memo')->group(function () {
    Route::get('/','MemoController@index')->name('memo');

});

Route::prefix('product')->group(function () {
    Route::get('/','ProductController@index')->name('product');

});

Route::prefix('board')->group(function () {
    Route::get('/','BoardController@list')->name('board.list'); // 게시판 목록
    Route::post('/data','BoardController@data')->name('board.data');
    Route::get('/create','BoardController@create')->name('board.create')->middleware('auth'); // 글쓰기 폼
    Route::post('/store','BoardController@store')->name('board.store')->middleware('auth'); // 글쓰기 처리
    Route::get('/{id?}','BoardController@detail')->name('board.detail'); // 상세화면
});

Route::prefix('todo')->group(function () {
    Route::get('/','TodoController@index')->name('memo');

});

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
    return view('home');
});
// Route::get('/todolist/public/todolist', function () {
Route::get('/todolist', function () {
    return view('todolist');
})->name('todolist');
Route::resource('insertevent','InsertController');
Route::get('updateevent/{id}/{checkStatus}','InsertController@updateevent');
Route::get('/todolist','InsertController@showtable')->name('todolist');
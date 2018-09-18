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

Route::resource('todolists', 'ToDoListController');
Route::resource('tasks', 'TaskController');

Route::get('todolists/{id}', 'ToDoListController@show');

Route::get('tasks/create/{id}', 'TaskController@create')->name('tasks.create');
Route::get('tasks/', 'TaskController@index')->name('tasks.index');
Route::get('tasks/edit/{id}', 'TaskController@edit')->name('tasks.edit');
Route::get('tasks/store', 'TaskController@store')->name('tasks.store');
Route::delete('tasks/destroy/{id}', 'TaskController@destroy')->name('tasks.delete');
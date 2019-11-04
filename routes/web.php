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

Route::get('/', 'ProjectController@index')->name('project.index');

Route::get('create/photo','ProjectController@create')->name('project.create');

Route::get('view/photo/{id}','ProjectController@view')->name('project.view');

Route::get('edit/photo/{id}','ProjectController@edit')->name('project.edit');

Route::post('store/photo','ProjectController@store')->name('project.store');

Route::put('update/photo/{id}','ProjectController@update')->name('project.update');

Route::delete('delete/photo/{id}','ProjectController@destroy')->name('project.destroy');
 




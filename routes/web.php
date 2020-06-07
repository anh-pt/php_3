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
    return view('welcome');
});
Route::get('/backend','HomeController@index')->name('trang-chu');
Route::get('/backend/product','ProductController@index')->name('backend.product.index');
Route::match(['get','post'],'/backend/product/add','ProductController@add')->name('backend.product.add');
Route::get('/backend/categories','CategoriesController@index')->name('backend.categories.index');
Route::match(['get','post'],'/backend/categories/add','CategoriesController@add')->name('backend.categories.add');
Route::match(['get','post'],'/backend/categories/edit/{id}','CategoriesController@edit')
             ->where(['id'=>'[0-9]+'])
             ->name('backend.categories.edit');
Route::match(['get','post'],'/backend/categories/delete/{id}','CategoriesController@delete')
    ->where(['id'=>'[0-9]+'])
    ->name('backend.categories.delete');
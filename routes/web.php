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

Route::get('/', 'HomeController@index');
Route::get('/newbooks', 'HomeController@showNewbook')->name('newbooks');
Route::get('search/', 'BookController@searchByName')->name('search');
Route::get('category/{id?}', 'BookController@searchCategory')->name('category');
Route::get('publishser/{id?}', 'BookController@searchPublisher')->name('publisher');
Route::get('author/{id?}', 'BookController@searchAuthor')->name('author');

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkadmin']], function () {
    Route::resource('list-books', 'BookController');
    Route::resource('slide', 'SlideController', ['names' => [
        'index' => 'admin.slide.index',
        'create' => 'admin.slide.create',
        'store' => 'admin.slide.store',
        'edit' => 'admin.slide.edit',
        'update' => 'admin.slide.update',
        'destroy' => 'admin.slide.destroy',
    ]]);
});

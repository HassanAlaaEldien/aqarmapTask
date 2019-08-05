<?php

/*use Illuminate\Support\Facades\Auth;



|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    /* Authentication Routes */
    Route::get('login', 'AuthenticationController@index')->name('login');
    Route::post('login', 'AuthenticationController@login')->name('authenticateUser');
    Route::get('logout', 'AuthenticationController@logout')->name('logout');

    Route::get('/', 'AuthenticationController@home')->name('adminHome');

    Route::resource('articles', 'ArticlesController');

    Route::resource('categories', 'CategoriesController');
});

Route::get('/','FrontController@index')->name('home');

Route::get('/post/{article}','FrontController@post')->name('post');

Route::resource('articles.comments', 'CommentsController');


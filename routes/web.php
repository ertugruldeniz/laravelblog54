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


Route::group(['middleware'=>['web']],function (){

// Authentication routes...
    Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('auth/login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

    Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);





Route::get('blog/{slug}', ['as'=> 'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug',  '[\w\d\-\_]+');

Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'/blog.index']);
Route::get('/','PagesController@getIndex');
Route::get('/about','PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::resource('posts','PostController');

});
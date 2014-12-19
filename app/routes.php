<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'NewsController@index');

Route::group(array('before' => 'auth'), function(){
    Route::get('/news/create', 'NewsController@create');
    Route::post('/news', array('before'=>'csrf', 'uses'=>'NewsController@store'));
    Route::get('/news/{id}/edit', 'NewsController@edit');
    Route::put('/news/{id}', array('before'=>'csrf', 'uses'=>'NewsController@update'));
    Route::delete('/news/{id}', 'NewsController@destroy');
    //Logout
    Route::get('account/logout', 'UserController@logout');
});

Route::get('/news/{id}', 'NewsController@show');

Route::get('/category/{id}', 'CategoriesController@show');

//Registration
Route::get('/account/create', 'UserController@create');
Route::post('account/', array('before'=>'csrf', 'uses'=>'UserController@store'));

//Login
Route::get('/account/login', 'UserController@getLogin');
Route::post('/account/login', array('before'=>'csrf', 'uses'=>'UserController@postLogin')); 

View::composer('navigation', function($view){    
    $view->categories = Category::all();
});
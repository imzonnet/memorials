<?php

/*
 * Login Route
 */

Route::get('/backend/auth/login', ['as' => 'backend.auth.getLogin', 'uses' => 'Backend\AuthController@getLogin']);
Route::post('/backend/auth/login', ['as' => 'backend.auth.postLogin', 'uses' => 'Backend\AuthController@postLogin']);
Route::get('/backend/auth/logout', ['as' => 'backend.auth.getLogout', 'uses' => 'Backend\AuthController@getLogout']);

/*
 * Backend Route
 */
Route::get('/admin', function(){
    \Session::flush();
});


Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {
    Route::get('/', 'Backend\HomeController@index');

});


<?php

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::resource('post', 'Backend\PostController');
    Route::resource('page', 'Backend\PostController');

});
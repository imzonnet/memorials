<?php

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::resource('posts', 'Backend\PostController');
    Route::resource('post-categories', 'Backend\CategoryController');

    Route::resource('pages', 'Backend\PostController');

});
<?php

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::resource('flower', 'Backend\FlowerController');

});
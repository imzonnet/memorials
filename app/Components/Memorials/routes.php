<?php
/**
 * Memorials Route
 */

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::resource('memorial', 'Backend\MemorialController');
});

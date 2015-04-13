<?php
/**
 * Memorials Route
 */

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::resource('memorial', 'Backend\MemorialController');
    Route::resource('timeline', 'Backend\TimelineController', ['only' => 'destroy']);
    Route::resource('memorial.guestbook', 'Backend\GuestbookController');
    Route::resource('memorial.album', 'Backend\PhotoAlbumController');
    Route::resource('album.photo', 'Backend\PhotoItemController', ['only' => ['index', 'destroy']]);
    Route::resource('memorial.video', 'Backend\VideoController');
    Route::resource('memorial.service', 'Backend\ServiceController');

    Route::post('upload_photo/{id}', ['as' => 'backend.upload.photo', 'uses' => 'Backend\PhotoItemController@uploadPhoto']);

});

/**
 * Front End Route
 */
Route::get('/memorial', 'MemorialController@index');
Route::get('/biography', 'MemorialController@biography');
Route::get('/photo-album', 'MemorialController@photoAlbum');
Route::get('/album', 'MemorialController@album');
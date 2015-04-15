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

Route::get('/home', ['as' => 'home' ,'uses' => 'MemorialController@index']);


Route::get('/memorial/{slug}/{id}',['as' => 'memorial.show', 'uses' => 'MemorialController@show'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/biography',['as' => 'memorial.biography', 'uses' => 'MemorialController@showBiography'])->where('id', '[0-9]+');

Route::get('/memorial/{slug}/{id}/photo-albums',['as' => 'memorial.photoAlbums', 'uses' => 'MemorialController@showPhotoAlbums'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/album/{aid}',['as' => 'memorial.photoAlbums.items', 'uses' => 'MemorialController@showPhotoItems'])->where(['id' => '[0-9]+', 'aid' => '[0-9]+']);

Route::get('/memorial/{slug}/{id}/photo/{pid}',['as' => 'memorial.photoAlbums.photo', 'uses' => 'PhotoItemController@show'])->where(['id' => '[0-9]+', 'pid' => '[0-9]+']);

Route::get('/memorial/{slug}/{id}/videos',['as' => 'memorial.videos', 'uses' => 'MemorialController@showVideos'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/guestbooks',['as' => 'memorial.guestbooks', 'uses' => 'MemorialController@showguestbooks'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/family',['as' => 'memorial.family', 'uses' => 'MemorialController@showFamily'])->where('id', '[0-9]+');
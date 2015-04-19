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

Route::get('/memorial/{slug}/{id}/photo-albums',['as' => 'memorial.photoAlbums', 'uses' => 'PhotoController@showPhotoAlbums'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/album/{aid}',['as' => 'memorial.photoAlbums.items', 'uses' => 'PhotoController@showPhotoItems'])->where(['id' => '[0-9]+', 'aid' => '[0-9]+']);

Route::get('/memorial/{slug}/{id}/photo/{pid}',['as' => 'memorial.photoAlbums.photo', 'uses' => 'PhotoController@show'])->where(['id' => '[0-9]+', 'pid' => '[0-9]+']);

Route::get('/memorial/{slug}/{id}/videos',['as' => 'memorial.videos', 'uses' => 'MemorialController@showVideos'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/guestbooks',['as' => 'memorial.guestbooks', 'uses' => 'GuestbookController@index'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/family',['as' => 'memorial.family', 'uses' => 'MemorialController@showFamily'])->where('id', '[0-9]+');

//Services
Route::get('/memorial/{slug}/{id}/services',['as' => 'memorial.services', 'uses' => 'ServiceController@index'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/services/{sid}/bid',['as' => 'memorial.services.bid', 'uses' => 'ServiceController@create'])->where(['id' => '[0-9]+','sid' => '[0-9]+']);
Route::post('/memorial/{slug}/{id}/services/{sid}/bid',['as' => 'memorial.services.bid', 'uses' => 'ServiceController@store'])->where(['id' => '[0-9]+','sid' => '[0-9]+']);
//Flower
Route::get('/memorial/{slug}/{id}/flowers',['as' => 'memorial.flowers', 'uses' => 'FlowerController@index'])->where('id', '[0-9]+');
Route::get('/memorial/{slug}/{id}/flower/{sid}/bid',['as' => 'memorial.flower.bid', 'uses' => 'FlowerController@create'])->where(['id' => '[0-9]+','sid' => '[0-9]+']);
Route::post('/memorial/{slug}/{id}/flower/{sid}/bid',['as' => 'memorial.flower.bid', 'uses' => 'FlowerController@store'])->where(['id' => '[0-9]+','sid' => '[0-9]+']);

/**
 * Comment
 */
//photo comment
Route::post('/ajax/comment/{type}/{id}', ['middleware' => 'auth', 'as' => 'ajax.comment', 'uses' => 'CommentController@index'])->where(['id' => '[0-9]+']);
Route::post('/ajax/like/{type}/{id}', ['middleware' => 'auth', 'as' => 'ajax.comment.like', 'uses' => 'CommentController@like'])->where(['id' => '[0-9]+']);
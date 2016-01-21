<?php

// Admin area
Route::get('admin', function () {
  return redirect('/admin/post');
});

$router->group([
    'middleware' => ['web', 'auth'],
], function () {
    Route::resource('admin/sink', 'Livit\Build\Controllers\Admin\SinkController');
    Route::resource('admin/post', 'Livit\Build\Controllers\Admin\PostController', ['except' => 'show']);
    Route::resource('admin/tag', 'Livit\Build\Controllers\Admin\TagController', ['except' => 'show']);
    Route::get('admin/upload', 'Livit\Build\Controllers\Admin\UploadController@index');
    Route::post('admin/upload/file', 'Livit\Build\Controllers\Admin\UploadController@uploadFile');
    Route::delete('admin/upload/file', 'Livit\Build\Controllers\Admin\UploadController@deleteFile');
    Route::post('admin/upload/folder', 'Livit\Build\Controllers\Admin\UploadController@createFolder');
    Route::delete('admin/upload/folder', 'Livit\Build\Controllers\Admin\UploadController@deleteFolder');
});

$router->group([
    'middleware' => ['web'],
], function () {
    Route::get('test', 'Livit\Build\Controllers\PageController@index');

    Route::get('/', 'Livit\Build\Controllers\HomeController@index');
    Route::get('blog', 'Livit\Build\Controllers\BlogController@index');
    Route::get('blog/{slug}', 'Livit\Build\Controllers\BlogController@showPost');
    Route::get('contact', 'Livit\Build\Controllers\ContactController@showForm');
    Route::post('contact', 'Livit\Build\Controllers\ContactController@sendContactInfo');

    // Logging in and out
    Route::get('/login', 'Livit\Build\Controllers\Auth\AuthController@getLogin');
    Route::post('/login', 'Livit\Build\Controllers\Auth\AuthController@postLogin');
    Route::get('/logout', 'Livit\Build\Controllers\Auth\AuthController@getLogout');
});
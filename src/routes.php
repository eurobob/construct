<?php

Route::get('blog', 'Livit\Build\Controllers\BlogController@index');
Route::get('blog/{slug}', 'Livit\Build\Controllers\BlogController@showPost');
Route::get('contact', 'Livit\Build\Controllers\ContactController@showForm');
Route::post('contact', 'Livit\Build\Controllers\ContactController@sendContactInfo');

// Admin area
get('admin', function () {
  return redirect('/admin/post');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/post', 'Livit\Build\Controllers\PostController', ['except' => 'show']);
    resource('admin/tag', 'Livit\Build\Controllers\TagController', ['except' => 'show']);
    get('admin/upload', 'Livit\Build\Controllers\UploadController@index');
    post('admin/upload/file', 'Livit\Build\Controllers\UploadController@uploadFile');
    delete('admin/upload/file', 'Livit\Build\Controllers\UploadController@deleteFile');
    post('admin/upload/folder', 'Livit\Build\Controllers\UploadController@createFolder');
    delete('admin/upload/folder', 'Livit\Build\Controllers\UploadController@deleteFolder');
});

// Logging in and out
get('/auth/login', 'Livit\Build\Controllers\Auth\AuthController@getLogin');
post('/auth/login', 'Livit\Build\Controllers\Auth\AuthController@postLogin');
get('/auth/logout', 'Livit\Build\Controllers\Auth\AuthController@getLogout');
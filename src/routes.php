<?php

Route::get('blog', 'Livit\Build\BlogController@index');
Route::get('blog/{slug}', 'Livit\Build\BlogController@showPost');
Route::get('contact', 'Livit\Build\ContactController@showForm');
Route::post('contact', 'Livit\Build\ContactController@sendContactInfo');

// Admin area
get('admin', function () {
  return redirect('/admin/post');
});
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'auth',
], function () {
    resource('admin/post', 'Livit\Build\PostController', ['except' => 'show']);
    resource('admin/tag', 'Livit\Build\TagController', ['except' => 'show']);
    get('admin/upload', 'Livit\Build\UploadController@index');
    post('admin/upload/file', 'Livit\Build\UploadController@uploadFile');
    delete('admin/upload/file', 'Livit\Build\UploadController@deleteFile');
    post('admin/upload/folder', 'Livit\Build\UploadController@createFolder');
    delete('admin/upload/folder', 'Livit\Build\UploadController@deleteFolder');
});

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');
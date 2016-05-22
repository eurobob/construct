<?php

// Admin area
Route::get('admin', function () {
  return redirect('/admin/post');
});

$router->group([
    'middleware' => ['web', 'auth'],
], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'Eurobob\Construct\Controllers\HomeController@index']);

    Route::resource('admin/sink', 'Eurobob\Construct\Controllers\Admin\SinkController');
    Route::resource('admin/post', 'Eurobob\Construct\Controllers\Admin\PostController', ['except' => 'show']);
    Route::resource('admin/tag', 'Eurobob\Construct\Controllers\Admin\TagController', ['except' => 'show']);
    Route::get('admin/upload', 'Eurobob\Construct\Controllers\Admin\UploadController@index');
    Route::post('admin/upload/file', 'Eurobob\Construct\Controllers\Admin\UploadController@uploadFile');
    Route::delete('admin/upload/file', 'Eurobob\Construct\Controllers\Admin\UploadController@deleteFile');
    Route::post('admin/upload/folder', 'Eurobob\Construct\Controllers\Admin\UploadController@createFolder');
    Route::delete('admin/upload/folder', 'Eurobob\Construct\Controllers\Admin\UploadController@deleteFolder');

    Route::put('edit/{model}/{id}', 'Eurobob\Construct\Controllers\EditableController@update');
});

$router->group([
    'middleware' => ['web'],
], function () {
    Route::get('test', 'Eurobob\Construct\Controllers\PageController@index');
    
    Route::get('blog', 'Eurobob\Construct\Controllers\BlogController@index');
    Route::get('blog/{slug}', 'Eurobob\Construct\Controllers\BlogController@showPost');
    Route::get('contact', 'Eurobob\Construct\Controllers\ContactController@showForm');
    Route::post('contact', 'Eurobob\Construct\Controllers\ContactController@sendContactInfo');

    // Logging in and out
    Route::get('/login', 'App\Http\Controllers\Auth\AuthController@getLogin');
    Route::post('/login', 'App\Http\Controllers\Auth\AuthController@postLogin');
    Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@logout');

    Route::get('social/{provider}', 'App\Http\Controllers\Auth\AuthController@redirectToProvider');
    Route::get('social/{provider}/callback', 'App\Http\Controllers\Auth\AuthController@handleProviderCallback');
});
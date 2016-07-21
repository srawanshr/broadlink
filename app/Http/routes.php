<?php

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Frontend\FrontController@index')->name('index');
Route::get('/services/{service}', 'Frontend\ServiceController@show')->name('service::show');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

$router->group([
    'namespace' => 'Backend',
    'middleware' => 'admin',
    'prefix' => 'admin',
    'as' => 'admin::'
], function () {
    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard Routes
    |--------------------------------------------------------------------------
    */
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Admin User CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'user.' ], function() {
        Route::get('user', 'AdminController@index')->name('index');
        Route::post('user', 'AdminController@store')->name('store');
        Route::post('user/update', 'AdminController@update')->name('update');
        Route::post('user/delete', 'AdminController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | PIN Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'pin.' ], function() {
        Route::get('pin', 'PinController@index')->name('index');
        Route::get('pin/import', 'PinController@create')->name('create');
        Route::post('pin', 'PinController@store')->name('store');
    });

    /*
    |--------------------------------------------------------------------------
    | Banner Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'banner.' ], function() {
        Route::get('banner', 'BannerController@index')->name('index');
        Route::post('banner', 'BannerController@store')->name('store');
        Route::post('banner/delete', 'BannerController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Page Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'prefix' => 'page', 'as' => 'page.' ], function() {
        Route::get('/', 'PageController@index')->name('index');
        Route::get('create', 'PageController@create')->name('create');
        Route::post('/', 'PageController@store')->name('store');
        Route::get('{page_slug}', 'PageController@edit')->name('edit');
        Route::put('{page_slug}', 'PageController@update')->name('update');
        Route::delete('{page_slug}', 'PageController@destroy')->name('destroy');

        Route::get('{page_slug}/sub-page/create', 'SubPageController@create')->name('sub.create');
        Route::post('{page_slug}/sub-page', 'SubPageController@store')->name('sub.store');
        Route::get('{page_slug}/sub-page/{sub_page_slug}', 'SubPageController@edit')->name('sub.edit');
        Route::put('{page_slug}/sub-page/{sub_page_slug}', 'SubPageController@update')->name('sub.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Asset Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'prefix' => 'upload' ], function() {
        Route::get('/', 'UploadController@index');
        Route::post('file', 'UploadController@uploadFile');
        Route::delete('file', 'UploadController@deleteFile');
        Route::post('folder', 'UploadController@createFolder');
        Route::delete('folder', 'UploadController@deleteFolder');
    });
});

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
*/
$router->group([
    'namespace' => 'Backend',
    'middleware' => 'admin',
    'prefix' => 'api',
    'as' => 'admin::'
], function () {
    Route::get('file', 'UploadController@fileList')->name('file.list');
    Route::post('admin-user', 'AdminController@adminList')->name('user.list');
});

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
*/
Route::get('auth/login', 'Auth\AuthController@showLoginForm');
Route::post('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@logout');

Route::get('admin/login', 'AdminAuth\AuthController@showLoginForm');
Route::post('admin/login', 'AdminAuth\AuthController@login');
Route::get('admin/logout', 'AdminAuth\AuthController@logout');

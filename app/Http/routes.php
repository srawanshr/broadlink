<?php

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Frontend\FrontController@index')->name('index');
Route::get('/service/{service}', 'Frontend\ServiceController@show')->name('service::show');
Route::get('/service', 'Frontend\ServiceController@index')->name('service::index');
Route::get('/contact', 'Frontend\FrontController@contact')->name('contact::index');
Route::get('/help', 'Frontend\FrontController@help')->name('help::index');

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

Route::get('admin/login', 'AdminAuth\AuthController@showLoginForm');
Route::post('admin/login', 'AdminAuth\AuthController@login');
Route::get('admin/logout', 'AdminAuth\AuthController@logout');

Route::get('register', 'Auth\AuthController@showLoginForm');
Route::post('register', 'Auth\AuthController@store');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {
    return redirect('/admin/dashboard');
});

$router->group([
    'namespace' => 'Frontend',
    'middleware' => 'auth',
    'prefix' => 'user',
    'as' => 'user::'
], function () {
    /*
    |--------------------------------------------------------------------------
    | Various Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {
        return redirect('user/dashboard');
    });
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

});

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
    | Various Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('settings', 'SettingController@index')->name('setting');
    Route::put('settings', 'SettingController@update')->name('setting.update');
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::put('menu', 'MenuController@update')->name('menu.update');

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
        Route::get('user/{user_slug}', 'AdminController@show')->name('show');
        Route::put('user/{user_slug}', 'AdminController@updateProfile')->name('profile.update');
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
        Route::delete('banner/{banner_id}', 'BannerController@destroy')->name('destroy');
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
        Route::get('{page_slug}/edit', 'PageController@edit')->name('edit');
        Route::put('{page_slug}', 'PageController@update')->name('update');
        Route::delete('{page_slug}', 'PageController@destroy')->name('destroy');

        Route::get('{page_slug}/sub-page/create', 'SubPageController@create')->name('sub.create');
        Route::post('{page_slug}/sub-page', 'SubPageController@store')->name('sub.store');
        Route::get('{page_slug}/sub-page/{sub_page_slug}/edit', 'SubPageController@edit')->name('sub.edit');
        Route::put('{page_slug}/sub-page/{sub_page_slug}', 'SubPageController@update')->name('sub.update');
        Route::delete('{page_slug}/sub-page/{sub_page_slug}', 'SubPageController@destroy')->name('sub.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Service Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'prefix' => 'service', 'as' => 'service.' ], function () {
        Route::get('/', 'ServiceController@index')->name('index');
        Route::get('create', 'ServiceController@create')->name('create');
        Route::post('/', 'ServiceController@store')->name('store');
        Route::get('{service_slug}/edit', 'ServiceController@edit')->name('edit');
        Route::put('{service_slug}', 'ServiceController@update')->name('update');
        Route::delete('{service_slug}', 'ServiceController@destroy')->name('destroy');
        Route::post('sort/order', 'ServiceController@updateSortOrder')->name('sort.order');
    });

    /*
    |--------------------------------------------------------------------------
    | Plan Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'prefix' => 'plan', 'as' => 'plan.' ], function () {
        Route::get('/', 'PlanController@index')->name('index');
        Route::get('create', 'PlanController@create')->name('create');
        Route::post('/', 'PlanController@store')->name('store');
        Route::get('{plan_slug}/edit', 'PlanController@edit')->name('edit');
        Route::put('{plan_slug}', 'PlanController@update')->name('update');
        Route::delete('{plan_slug}', 'PlanController@destroy')->name('destroy');
        Route::post('sort/order', 'PlanController@updateSortOrder')->name('sort.order');
    });

    /*
    |--------------------------------------------------------------------------
    | Product Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'prefix' => 'product', 'as' => 'product.' ], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('create', 'ProductController@create')->name('create');
        Route::post('/', 'ProductController@store')->name('store');
        Route::get('{product_slug}/edit', 'ProductController@edit')->name('edit');
        Route::put('{product_slug}', 'ProductController@update')->name('update');
        Route::delete('{product_slug}', 'ProductController@destroy')->name('destroy');
        Route::post('sort/order', 'ProductController@updateSortOrder')->name('sort.order');
    });

    /*
    |--------------------------------------------------------------------------
    | Contact CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group([ 'as' => 'contact.' ], function() {
        Route::get('contact', 'ContactController@index')->name('index');
        Route::post('contact', 'ContactController@store')->name('store');
        Route::post('contact/update', 'ContactController@update')->name('update');
        Route::post('contact/delete', 'ContactController@destroy')->name('destroy');
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
    Route::post('pin', 'PinController@pinList')->name('pin.list');
    Route::post('admin-user', 'AdminController@adminList')->name('user.list');
    Route::post('contact', 'ContactController@contactList')->name('contact.list');
    Route::post('contact-type', 'ContactController@contactTypeList')->name('contact.type.list');
});
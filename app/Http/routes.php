<?php

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

Route::post('subscribe', 'Frontend\ContactController@subscribe');
/*
|--------------------------------------------------------------------------
| Password reset link request routes
|--------------------------------------------------------------------------
*/
Route::post('password/email', 'Auth\PasswordController@postEmail');

/*
|--------------------------------------------------------------------------
| Password reset routes
|--------------------------------------------------------------------------
*/
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/
Route::get('/', 'Frontend\FrontController@index')->name('index');
Route::get('/service/{service}', 'Frontend\ServiceController@show')->name('service::show');

Route::get('/service/{service}/product/{product_slug}/order', 'Frontend\ServiceController@orderForm')->name('service::orderForm');
Route::post('/order', 'Frontend\ServiceController@order')->name('service::order');

Route::get('/voucher', 'Frontend\VoucherController@index')->name('voucher::index');
Route::get('/voucher/{voucher}', 'Frontend\VoucherController@show')->name('voucher::show');
Route::any('/voucher/{voucher}/buy', 'Frontend\VoucherController@buy')->name('voucher::buy');

Route::get('/service', 'Frontend\ServiceController@index')->name('service::index');
Route::get('/help', 'Frontend\FrontController@help')->name('help::index');

Route::get('/forms','Frontend\PageController@index');
Route::post('/forms','Frontend\PageController@forms');

Route::get('/complaint','Frontend\pageController@complain');
Route::post('/complaint','Frontend\PageController@registercomplaint');

Route::get('/cart', 'Frontend\CartController@index')->name('cart::index');
Route::delete('/cart/{item_id}', 'Frontend\CartController@delete')->name('cart::delete');

Route::get('/cart/payment', 'Frontend\CartController@getCheckout')->name('cart::payment');
Route::get('/payment/esewa/success', 'Frontend\CartController@esewaRedirect')->name('esewa::success');

Route::post('/cart/checkout', 'Frontend\CartController@postCheckout')->name('cart::checkout');
Route::get('/invoice/{invoice_slug}', 'Frontend\UserController@invoice')->name('invoice::show');

Route::get('/post', 'Frontend\FrontController@postIndex')->name('post::index');
Route::get('/post/{post}', 'Frontend\FrontController@post')->name('post::show');

Route::get('/page/{page_slug}', 'Frontend\FrontController@page')->name('page::show');

Route::group(['namespace' => 'Frontend', 'prefix' => 'contact', 'as' => 'contact::'], function ()
{
    Route::get('/', 'ContactController@index')->name('index');
    Route::post('feedback', 'ContactController@sendFeedback')->name('feedback');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

$router->group([
    'namespace'  => 'Frontend',
    'middleware' => 'auth',
    'prefix'     => 'user',
    'as'         => 'user::'
], function ()
{
    /*
    |--------------------------------------------------------------------------
    | Frontend User Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/', function ()
    {
        return redirect('user/dashboard');
    });
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('edit', 'UserController@edit')->name('edit');
    Route::put('update', 'UserController@update')->name('update');
    Route::put('change/{user_slug}/password', 'UserController@changePassword')->name('changePassword');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin', function ()
{
    return redirect('/admin/dashboard');
});

$router->group([
    'namespace'  => 'Backend',
    'middleware' => 'admin',
    'prefix'     => 'admin',
    'as'         => 'admin::'
], function ()
{
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
    Route::group(['as' => 'user.'], function ()
    {
        Route::get('user', 'AdminController@index')->name('index');
        Route::post('user', 'AdminController@store')->name('store');
        Route::post('user/update', 'AdminController@update')->name('update');
        Route::post('user/delete', 'AdminController@destroy')->name('destroy');
        Route::get('user/{admin_slug}', 'AdminController@show')->name('show');
        Route::put('user/{admin_slug}', 'AdminController@updateProfile')->name('profile.update');
    });

    /*
    |--------------------------------------------------------------------------
    | Post Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'post', 'as' => 'post.'], function ()
    {
        Route::get('/', 'PostController@index')->name('index');
        Route::get('create', 'PostController@create')->name('create');
        Route::post('/', 'PostController@store')->name('store');
        Route::get('{post}/edit', 'PostController@edit')->name('edit');
        Route::put('{post}', 'PostController@update')->name('update');
        Route::delete('{post}', 'PostController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | PIN Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'pin.'], function ()
    {
        Route::get('pin', 'PinController@index')->name('index');
        Route::get('pin/import', 'PinController@create')->name('create');
        Route::post('pin', 'PinController@store')->name('store');
        Route::delete('{pin}', 'PinController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Banner Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['as' => 'banner.'], function ()
    {
        Route::get('banner', 'BannerController@index')->name('index');
        Route::post('banner', 'BannerController@store')->name('store');
        Route::delete('banner/{banner_id}', 'BannerController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Page Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'page', 'as' => 'page.'], function ()
    {
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
    Route::group(['prefix' => 'service', 'as' => 'service.'], function ()
    {
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
    Route::group(['prefix' => 'plan', 'as' => 'plan.'], function ()
    {
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
    Route::group(['prefix' => 'product', 'as' => 'product.'], function ()
    {
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
    | Client Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'client', 'as' => 'client.'], function ()
    {
        Route::get('/', 'ClientController@index')->name('index');
        Route::get('create', 'ClientController@create')->name('create');
        Route::post('/', 'ClientController@store')->name('store');
        Route::get('{client_slug}/edit', 'ClientController@edit')->name('edit');
        Route::put('{client_slug}', 'ClientController@update')->name('update');
        Route::delete('{client_slug}', 'ClientController@destroy')->name('destroy');
        Route::post('sort/order', 'ClientController@updateSortOrder')->name('sort.order');
    });

    /*
   |--------------------------------------------------------------------------
   | Testimonial Management Routes
   |--------------------------------------------------------------------------
   */
    Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function ()
    {
        Route::get('/', 'TestimonialController@index')->name('index');
        Route::get('create', 'TestimonialController@create')->name('create');
        Route::post('/', 'TestimonialController@store')->name('store');
        Route::get('{testimonial}/edit', 'TestimonialController@edit')->name('edit');
        Route::put('{testimonial}', 'TestimonialController@update')->name('update');
        Route::delete('{testimonial}', 'TestimonialController@destroy')->name('destroy');
        Route::post('sort/order', 'TestimonialController@updateSortOrder')->name('sort.order');
    });

    /*
    |--------------------------------------------------------------------------
    | Contact CRUD Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function ()
    {
        Route::get('/', 'ContactController@index')->name('index');
        Route::post('/', 'ContactController@store')->name('store');
        Route::post('update', 'ContactController@update')->name('update');
        Route::post('delete', 'ContactController@destroy')->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Asset Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'upload'], function ()
    {
        Route::get('/', 'UploadController@index');
        Route::post('file', 'UploadController@uploadFile');
        Route::delete('file', 'UploadController@deleteFile');
        Route::post('folder', 'UploadController@createFolder');
        Route::delete('folder', 'UploadController@deleteFolder');
    });

    /*
    |--------------------------------------------------------------------------
    | Order Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'order', 'as' => 'order.'], function ()
    {
        Route::get('/', 'OrderController@index')->name('index');

        Route::get('report', 'OrderController@report')->name('report');
    });

    /*
    |--------------------------------------------------------------------------
    | Customer Management Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function ()
    {
        Route::get('/', 'CustomerController@index')->name('index');
    });
});

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
*/
$router->group([
    'namespace'  => 'Backend',
    'middleware' => 'admin',
    'prefix'     => 'api',
    'as'         => 'admin::'
], function ()
{
    Route::get('file', 'UploadController@fileList')->name('file.list');
    Route::post('pin', 'PinController@pinList')->name('pin.list');
    Route::post('admin-user', 'AdminController@adminList')->name('user.list');
    Route::post('contact', 'ContactController@contactList')->name('contact.list');
    Route::post('contact-type', 'ContactController@contactTypeList')->name('contact.type.list');
    Route::post('post', 'PostController@postList')->name('post.list');
    Route::post('order', 'OrderController@orderList')->name('order.list');
    Route::post('customer', 'CustomerController@customerList')->name('customer.list');
});
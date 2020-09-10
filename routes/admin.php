<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
         //Route categories
         Route::get('/categories', 'Admin\AdminCategoryController@index')->name('admin.categories.index');
         Route::get('/categories/create', 'Admin\AdminCategoryController@create')->name('admin.categories.create');
         Route::post('/categories', 'Admin\AdminCategoryController@store')->name('admin.categories.store');
         Route::get('/categories/{category}/edit', 'Admin\AdminCategoryController@edit')->name('admin.categories.edit');
         Route::patch('/categories/update/{category}', 'Admin\AdminCategoryController@update')->name('admin.categories.update');
         Route::delete('/categories/delete/{category}', 'Admin\AdminCategoryController@destroy')->name('admin.categories.destroy');

          //Routes products pour l'administration
          Route::get('/products', 'Admin\AdminProductsController@index')->name('admin.products.index');
          Route::get('/products/create', 'Admin\AdminProductsController@create')->name('admin.products.create');
          Route::post('/products', 'Admin\AdminProductsController@store')->name('admin.products.store');
          Route::get('/products/show/{product}', 'Admin\AdminProductsController@show')->name('admin.products.show');
          Route::get('/products/{product}/edit', 'Admin\AdminProductsController@edit')->name('admin.products.edit');
          Route::patch('/products/{product}', 'Admin\AdminProductsController@update')->name('admin.products.update');
          Route::delete('/products/{product}', 'Admin\AdminProductsController@destroy')->name('admin.products.destroy'); 

          //----------------------------Managercontroller---------------------------------------------------------------//
           //------------------------------------------Manager color
           Route::get('/color', 'Admin\AdminManagerStatusController@indexColor')->name('admin.managers.colors.index');
           Route::get('/color/create', 'Admin\AdminManagerStatusController@createColor')->name('admin.managers.colors.create');
           Route::get('/color/edit/{id?}', 'Admin\AdminManagerStatusController@editColor')->name('admin.managers.colors.edit');
           Route::post('/color/update', 'Admin\AdminManagerStatusController@updateColor')->name('admin.managers.colors.update');
           Route::post('/color/store', 'Admin\AdminManagerStatusController@storeColor')->name('admin.managers.colors.store');
           Route::get('/color/destroy/{id}', 'Admin\AdminManagerStatusController@destroyColor')->name('admin.managers.colors.destroy');
           Route::get('/color/restaure', 'Admin\AdminManagerStatusController@restaureColor')->name('admin.managers.colors.restaurecolor');
           //-----------------------------------------------------Manager status----------------------------------------------------//
           Route::get('/status', 'Admin\AdminManagerStatusController@indexStatus')->name('admin.managers.status.index');
           Route::get('/status/create', 'Admin\AdminManagerStatusController@createStatus')->name('admin.managers.status.create');
           Route::get('/status/edit/{id?}', 'Admin\AdminManagerStatusController@editStatus')->name('admin.managers.status.edit');
           Route::post('/status/update', 'Admin\AdminManagerStatusController@updateStatus')->name('admin.managers.status.update');
           Route::post('/status/store', 'Admin\AdminManagerStatusController@storeStatus')->name('admin.managers.status.store');
           Route::get('/status/destroy/{id}', 'Admin\AdminManagerStatusController@destroyStatus')->name('admin.managers.status.destroy');

           //----------------------------------------------------------Payment Item Order------------------------------------------//
           Route::get('/customer/order', 'Admin\AdminManagerStatusController@Order')->name('admin.products.customers.order');
           Route::get('/customer/item', 'Admin\AdminManagerStatusController@OrderItem')->name('admin.products.customers.item');
           Route::get('/customer/payment', 'Admin\AdminManagerStatusController@Payment')->name('admin.products.customers.payment');

    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

   });

});
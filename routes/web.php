<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    // Inventories
    Route::resource('products', 'ProductController');
    Route::post('products/update/{product}', 'ProductController@updateproduct')->name('products.updateproduct');
    Route::post('products/stock/{product}', 'ProductController@addedstock')->name('products.addedproduct');

    // Orders
    Route::get('orders', 'OrderController@orders')->name('orders');

    // Sales Reports
    Route::get('sales_reports/{filter}', 'OrderController@sales_reports')->name('sales_reports');


     // Categories
     Route::resource('categories', 'CategoryController');

     // Employees
     Route::resource('employees', 'EmployeeController');

     // Accounts
     Route::resource('accounts', 'AccountController');

     // raws
     Route::resource('raw_inventory', 'RawController');
});


Route::group(['prefix' => 'customer', 'as' => 'customer.', 'namespace' => 'Customer', 'middleware' => ['auth']], function () {
    
    // ORDERS
    Route::get('product/{product}', 'OrderController@view')->name('product.view');
    Route::post('product/{product}', 'OrderController@order')->name('product.order');
    Route::get('orders', 'OrderController@orders')->name('orders.index');
    Route::get('orders/{order}/edit', 'OrderController@edit')->name('order.edit');
    Route::put('orders/{order}', 'OrderController@update')->name('order.update');
    Route::delete('orders/{order}', 'OrderController@cancel')->name('order.cancel');
    Route::get('orders/checkout', 'OrderController@checkout')->name('order.checkout');

    // ORDER HISTORY
    Route::get('orders_history', 'OrderController@orders_history')->name('orders.history');
    Route::post('orders/cancel/{order}', 'OrderController@cancel_order')->name('orders.cancel');

    // ACCOUNT
    Route::get('account', 'HomeController@account')->name('account');
    Route::put('account', 'HomeController@account_update')->name('account.update');
    Route::put('account/change_password/{user}', 'HomeController@passwordupdate')->name('account.passwordupdate');

    
    Route::get('/products/filter', 'HomeController@filter')->name('filter');
    Route::get('/products', 'HomeController@index')->name('products');
});
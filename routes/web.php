<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/dashboard');

Route::get('customer', function() {
     Auth::logout();
     return redirect('/login');
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

    // Change Status
    Route::put('orders/status/{order}', 'OrderController@status')->name('orders.status');

    // receipt
    Route::get('orders/receipt/{order}', 'OrderController@receipt')->name('orders.receipt');

    // Sales Reports
    Route::get('sales_reports/{filter}', 'OrderController@sales_reports')->name('sales_reports');
    

     // CustomerList
     Route::get('customer_list', 'CustomerListController@index')->name('customer');
     Route::get('customer_list/{user}/edit', 'CustomerListController@edit')->name('customer.edit');
     Route::put('customer_list/{user}', 'CustomerListController@update')->name('customer.update');
     Route::put('customer_list/{user}/dpass', 'CustomerListController@defaultPassowrd')->name('customer.dpass');

     // Admin List
     Route::get('admin_list', 'CustomerListController@admin_index')->name('admin');
     Route::post('admin_list', 'CustomerListController@admin_store')->name('admin.store');
     Route::put('admin_list/{admin}', 'CustomerListController@admin_update')->name('admin.update');

     // Change Status
     Route::put('customer/status/{user}', 'CustomerListController@status')->name('customer.status');
    
     // Categories
     Route::resource('categories', 'CategoryController');
});

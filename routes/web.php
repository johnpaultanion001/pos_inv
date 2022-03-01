<?php

use Illuminate\Support\Facades\Route;

// Route::redirect('/', '/admin/dashboard');

Route::get('/', 'LandingpageController@index')->name('landingpage');
Route::get('view/{product}', 'LandingpageController@view')->name('view');


Route::group(['prefix' => 'customer', 'as' => 'customer.', 'namespace' => 'Customer', 'middleware' => ['auth']], function () {
    Route::get('/approve', function() {
           return view('auth.checkapprove');
         });
 });



Auth::routes();


Route::group(['prefix' => 'customer', 'as' => 'customer.', 'namespace' => 'Customer', 'middleware' => ['auth', 'checkapproved']], function () {
   
    // Home
    Route::get('home', 'HomeController@index')->name('home');

    //Add To Cart
    Route::post('addtocart', 'OrderController@addtocart')->name('addtocart');
    Route::get('orders', 'OrderController@orders')->name('orders');
    Route::get('orders_history', 'OrderController@orders_history')->name('orders_history');

    //Check Out
    Route::post('checkout', 'OrderController@checkout')->name('checkout');


});

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

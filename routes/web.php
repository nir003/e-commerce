<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Schema::defaultStringLength(191);


//...... Frontend routes

Route::get('/','ViewController@loadHome');
Route::get('/products_by_category/{id}','ViewController@productsByCategory');
Route::get('/product_details/{id}','ViewController@productDetail');


Route::post('/add_to_cart/{id}','CartController@addToCart');
Route::get('/show_cart','CartController@showCart');
Route::get('/delete_item_from_cart/{id}','CartController@deleteItemFromCart');
Route::get('/cart_quantity_up/{id}/{qty}','CartController@cart_quantity_up');
Route::get('/cart_quantity_down/{id}/{qty}','CartController@cart_quantity_down');
Route::post('/cart_quantity_update/{id}','CartController@cart_quantity_update');












//............. Backend routes
Route::get('/admin','AdminController@loadAdminLogin');
Route::get('/admin-dashboard','AdminController@loadDashboardByGet');

Route::get('/admin_logout','AdminController@adminLogout');

Route::post('/admin-dashboard','AdminController@loadDashboard');


//................Category Routes
Route::get('/all-categories','CategoryController@loadCategory');
Route::post('/add_category','CategoryController@addCategory');
Route::post('/save_updatecategory/{id}','CategoryController@save_updateCategory');
Route::get('/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/update-category/{id}','CategoryController@updateCategory');
Route::get('/category_status/{id}','CategoryController@categoryStatus');



//................Manufacture Routes
Route::get('/all-manufactures','ManufactureController@loadManufacture');
Route::post('/add_manufacture','ManufactureController@addManufacture');
Route::post('/save_updatemanufacture/{id}','ManufactureController@save_updateManufacture');
Route::get('/delete-manufacture/{id}','ManufactureController@deleteManufacture');
Route::get('/update-manufacture/{id}','ManufactureController@updateManufacture');
Route::get('/manufacture_status/{id}','ManufactureController@ManufactureStatus');




//................Product Routes
Route::get('/all-products','ProductController@loadProduct');
Route::get('/add-products','ProductController@loadAddProductForm');
Route::post('/add_product','ProductController@addProduct');
Route::post('/save_updateproduct/{id}','ProductController@save_updateProduct');
Route::get('/delete-product/{id}','ProductController@deleteProduct');
Route::get('/update-product/{id}','ProductController@updateProduct');
Route::get('/product_status/{id}','ProductController@ProductStatus');



//................Slider Routes
Route::get('/all-sliders','SliderController@loadSlider');
Route::post('/add-slider','SliderController@addSlider');
Route::get('/delete-slider/{id}','SliderController@deleteSlider');
Route::get('/slider-status/{id}','SliderController@SliderStatus');

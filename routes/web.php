<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/admin/index', function () {
    return view('admin.dashboard');
});

Auth::routes();
Route::get('/','App\Http\Controllers\ClientController@index');
Route::get('/all-products','App\Http\Controllers\ClientController@allProduct')->name('all.product');
Route::get('/singleproduct/{id}','App\Http\Controllers\ClientController@singleProduct')->name('singleproduct');
Route::get('/categoryProduct/{slug}','App\Http\Controllers\ClientController@allProductByCat')->name('category.products');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('subcategories/{id}','App\Http\Controllers\ProductController@loadsubcategoreis');

Route::get('/add-to-cart/{product}','App\Http\Controllers\CartController@AddProductToCart')->name('addToCart');
Route::get('/cart','App\Http\Controllers\CartController@showCartProduct')->name('cart.product');
Route::post('/qty/update/{product}','App\Http\Controllers\CartController@cartQtyUpdate')->name('qty.update');
Route::post('/remove-product/{product}','App\Http\Controllers\CartController@removeProductfromCart')->name('remove.product');
Route::get('/check-out/{amount}','App\Http\Controllers\CartController@checkOut')->name('checkout');
Route::post('/charge','App\Http\Controllers\CartController@Charge')->name('cart.charge');
Route::get('/orders','App\Http\Controllers\CartController@Orders')->name('orders');


Route::resource('category','App\Http\Controllers\CategoryController');
Route::resource('sub-category','App\Http\Controllers\SubCategoryController');
Route::resource('product','App\Http\Controllers\ProductController');

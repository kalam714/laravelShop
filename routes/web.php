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
Route::get('/check-out/{amount}','App\Http\Controllers\CartController@checkOut')->name('checkout')->middleware('auth');;
Route::post('/charge','App\Http\Controllers\CartController@Charge')->name('cart.charge');
Route::get('/orders','App\Http\Controllers\CartController@Orders')->name('orders')->middleware('auth');;

//admin section 

Route::group(['prefix'=>'auth','middleware'=>['auth','admin']],function(){
    Route::get('/admin/index', function () {
        return view('admin.dashboard');
    });
Route::resource('category','App\Http\Controllers\CategoryController');
Route::resource('sub-category','App\Http\Controllers\SubCategoryController');
Route::resource('product','App\Http\Controllers\ProductController');
Route::get('/slider/create','App\Http\Controllers\SliderController@create')->name('slider.create');
Route::get('/sliders','App\Http\Controllers\SliderController@index')->name('slider.index');
Route::post('/slider/store','App\Http\Controllers\SliderController@store')->name('slider.store');
Route::delete('/slider/destroy/{id}','App\Http\Controllers\SliderController@destroy')->name('slider.destroy');
Route::get('customers','App\Http\Controllers\CustomerController@index')->name('customer');
Route::get('admin/orders','App\Http\Controllers\OrderController@index')->name('admin.order');
Route::get('admin/view-order/{userId}/{orderId}','App\Http\Controllers\OrderController@showOrderDetails')->name('admin.order.view');

});
<?php

use App\Http\Controllers\productController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\customerloginController;
use App\Http\Controllers\customerRegisterController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\couponController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\myAccount;

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



Auth::routes();

Route::get('/',[HomeController::class,'website']);
//Admin Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[HomeController::class,'dashboard']);
Route::get('/admin',[HomeController::class,'admin'])->name('admin');
Route::get('/single/product/{product_id}',[HomeController::class,'single_products']);
Route::post('/getsize',[HomeController::class,'getsize']);
Route::get('/register',[HomeController::class,'register']);

//profile controller
Route::get('/home/edit',[profileController::class,'profile_edit']);
Route::post('/profile/update',[profileController::class,'profile_update']);


//Category Route
Route::get('/category',[categoryController::class,'category']);
Route::post('/category/insert',[categoryController::class,'category_insert']);
Route::get('/category/delete/{category_id}',[categoryController::class,'category_delete']);
Route::get('/category/edit/{category_id}',[categoryController::class,'category_edit']);
Route::post('/category/update',[categoryController::class,'category_update']);


//subcategory
Route::get('/subCategory',[subcategoryController::class,'subCategory']);
Route::post('/subCategory/insert',[subcategoryController::class,'subCategory_insert']);
Route::get('/subCategory/delete/{subcategory_id}',[subcategoryController::class,'subcategory_delete']);
Route::get('/subCategory/edit/{subcategory_id}',[subcategoryController::class,'subcategory_edit']);
Route::post('/subCategory/update',[subcategoryController::class,'subcategory_update']);
Route::get('/subCategory/restore/{subcategory_id}',[subcategoryController::class,'restore']);
Route::get('/subCategory/hard/delete/{subcategory_id}',[subcategoryController::class,'p_delete']);


//products
Route::get('/products',[productController::class,"index"])->name('products');
Route::post('/products/insert',[productController::class,"Insert"]);
Route::post('/getSubcategory',[productController::class,"getSubcategory"]);
Route::get('/products/color',[productController::class,"color"])->name('colorSize');
Route::post('/products/color/insert',[productController::class,"color_insert"]);
Route::post('/products/size/insert',[productController::class,"size_insert"]);
Route::get('/subcategory/delete/size/{size_id}',[productController::class,"size_delete"]);
Route::get('/subcategory/delete/color/{color_id}',[productController::class,"color_delete"]);


//inventory controller
Route::get('/inventory/{product_id}',[productController::class,'inventory'])->name('inventory');
Route::post('/inventory/insert/',[productController::class,'inventory_insert']);


//Customer login
Route::post('/customer/login',[customerloginController::class,'customer_login'])->name('register');
Route::post('/customer/register',[customerRegisterController::class,'customer_register']);
Route::post('/customer/logout',[customerloginController::class,'customer_logout']);

//cart controller

Route::post('/cart/insert',[cartController::class,'cart_insert']);
Route::get('/cart',[cartController::class,'cart_info']);
Route::get('/cart/remove/{cart_id}',[cartController::class,'cart_remove']);
Route::get('/cart/clear',[cartController::class,'cart_clear']);
Route::post('/cart/update',[cartController::class,'cart_update']);


//coupon controller
Route::get('/coupon',[couponController::class,'coupon'])->name('coupon');
Route::post('/coupon/insert',[couponController::class,'coupon_insert']);

//checkout controller
Route::get('/checkout',[checkoutController::class,'checkout'])->name('checkout');
Route::post('/getCity',[checkoutController::class,'getcity']);
Route::get('/delivery',[checkoutController::class,'delivery']);
Route::post('/delivery/area',[checkoutController::class,'delivery_insert']);
Route::post('/order',[orderController::class,'order']);

Route::get('/myAccount',[myAccount::class,'my_account']);

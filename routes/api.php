<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\OrderDetailController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resources([
    'sliders' => SliderController::class,
    'products' => ProductController::class,
    'settings' => SettingController::class,
    'categories' => CategoryController::class,
    'customers' => CustomerController::class,
    'blogs' => BlogController::class,
    'tags' => TagController::class,
    'orders' => OrderController::class,
    'orderdetail' => OrderDetailController::class,
  
  
]);
Route::post('/customers/check_login/',[CustomerController::class,'check_login']);
Route::get('/products/showTag/{id}',[ProductController::class,'showTag']);
Route::get('/products/showImage/{id}',[ProductController::class,'showImage']);
Route::get('/products/showAttr/{id}',[ProductController::class,'showAttr']);
Route::get('/products/showList/{i}',[ProductController::class,'showList']);
Route::get('/products/newProduct/{i}',[ProductController::class,'newProduct']);
Route::get('/products/bestSeller/{i}',[ProductController::class,'bestSeller']);
Route::post('/sendContact',[ContactUsController::class,'sendContact']);



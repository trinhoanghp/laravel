<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\ReportOrderController;
use App\Http\Controllers\ReportProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'check_login']);

Route::group(['prefix'=>'admin','middleware'=> 'auth'],function()
{
    Route::get('',[AdminController::class,'index'])->name('admin.index');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');


    Route::resources([
        'category'  => CategoryController::class,
        'product'   => ProductController::class,
        'slider'    => SliderController::class,
        'customer'  => CustomerController::class,
        'setting'   => SettingController::class,
        'blog'   => BlogController::class,
        'user'   => UserController::class,
        'role'   => RoleController::class,
        'order'   => OrderController::class,
        'orderdetails'   => OrderDetailController::class,
        'attribute'   => AttributeController::class,
        'orderreport'   => ReportOrderController::class,
        'productreport'   => ReportProductController::class,
    ]);
    //category
    Route::get('/category-trash', [CategoryController::class,'category_trash'])->name('category.category_trash');
    Route::get('/category-untrash/{id}', [CategoryController::class,'category_untrash'])->name('category.category_untrash');
    Route::delete('/category-foredel/{id}', [CategoryController::class,'category_foredel'])->name('category.category_foredel');

    //Product
    Route::get('/product-trash', [ProductController::class,'product_trash'])->name('product.product_trash');
    Route::get('/product-untrash/{id}', [ProductController::class,'product_untrash'])->name('product.product_untrash');
    Route::delete('/product-foredel/{id}', [ProductController::class,'product_foredel'])->name('product.product_foredel');
    //Slider
    Route::get('/slider-trash', [SliderController::class,'slider_trash'])->name('slider.slider_trash');
    Route::get('/slider-untrash/{id}', [SliderController::class,'slider_untrash'])->name('slider.slider_untrash');
    Route::delete('/slider-foredel/{id}', [SliderController::class,'slider_foredel'])->name('slider.slider_foredel');
    // Export PDF
    Route::get('/order-to-pdf/{order}', [OrderController::class,'OrderToPDF'])->name('order.OrderToPDF');
    Route::get('/odreport-to-pdf', [ReportOrderController::class,'OdReportToPDF'])->name('orderreport.OdReportToPDF');
    Route::get('/proreport-to-pdf', [ReportProductController::class,'ProReportToPDF'])->name('productreport.ProReportToPDF');

});
Route::group(['prefix' => '/laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('login', [AuthController::class, 'index']) ->name('login') ;
Route::post('login', [AuthController::class, 'login']) ;
Route::get('logout', [AuthController::class, 'logout']) ;

Route::get('login_member', [AuthController::class, 'login_member']);
Route::post('login_member', [AuthController::class, 'login_member_action']) ;
Route::get('logout_member', [AuthController::class, 'logout_member']) ;

Route::get('register_member', [AuthController::class, 'register_member']) ;
Route::post('register_member', [AuthController::class, 'register_member_action']) ;

//kategori
Route::get('/kategori', [CategoryController::class, 'list2'])->name('category');
Route::post('/category/{id}/update', [CategoryController::class, 'update2']);
Route::get('/subkategori', [SubcategoryController::class, 'list2'])->name('subcategory');
Route::post('/subcategory/{id}/update', [SubcategoryController::class, 'update2']);
Route::get('/slider', [SliderController::class, 'list2'])->name('sliders');
Route::post('/sliders/{id}/update', [SliderController::class, 'update2']);
Route::get('/barang', [ProductController::class, 'list2'])->name('products');
Route::post('/barang/{id}/update', [ProductController::class, 'update2']);
Route::get('/testimoni', [TestimoniController::class, 'list2'])->name('testimoni');
Route::post('/testimoni/{id}/update', [TestimoniController::class, 'update2']);
Route::get('/reviews', [ReviewController::class, 'list']);
Route::get('/payment', [PaymentController::class, 'list']);

Route::get('/pesanan/baru', [OrderController::class, 'list']);
Route::get('/pesanan/dikonfirmasi', [OrderController::class, 'dikonfirmasi_list']);
Route::get('/pesanan/dikemas', [OrderController::class, 'dikemas_list']);
Route::get('/pesanan/dikirim', [OrderController::class, 'dikirim_list']);
Route::get('/pesanan/diterima', [OrderController::class, 'diterima_list']);
Route::get('/pesanan/selesai', [OrderController::class, 'selesai_list']);

Route::get('/laporan', [ReportController::class, 'list']);

Route::get('/tentang', [TentangController::class, 'index']);
Route::post('/tentang/{about}', [TentangController::class, 'update']);

Route::get('/dashboard', [DashboardController::class, 'index']) ;

//Home Route
Route::get('/', [HomeController::class, 'index']);
Route::get('/products/{category}', [HomeController::class, 'products']);
Route::get('/product/{id}', [HomeController::class, 'product']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/orders', [HomeController::class, 'orders']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/faq', [HomeController::class, 'faq']);

Route::post('/add_to_cart', [HomeController::class, 'add_to_cart']);
Route::get('/delete_from_cart/{cart}', [HomeController::class, 'delete_from_cart']);
Route::get('/get_kota/{id}', [HomeController::class, 'get_kota']);  

Route::post('/checkout_orders', [HomeController::class, 'checkout_orders']);

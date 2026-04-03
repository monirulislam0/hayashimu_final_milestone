<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('frontend.about');
Route::get('/certification', [FrontendController::class, 'certification'])->name('frontend.certification');
Route::get('/service', [FrontendController::class, 'service'])->name('frontend.service');
Route::get('/contact', [FrontendController::class, 'contactUs'])->name('frontend.contact');
Route::get('/news/{type}', [FrontendController::class, 'news'])->name('frontend.news');
Route::get('/news/{type}/{slug}', [FrontendController::class, 'newsDetail'])->name('frontend.news.detail');
Route::get('/product-center', [FrontendController::class, 'productCenter'])->name('frontend.product.center');
Route::get('/products/{slug}', [FrontendController::class, 'categoryProduct'])->name('frontend.products');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products.all');
Route::get('/product/{slug}', [FrontendController::class, 'productDetail'])->name('frontend.product.detail');
Route::post('search', [FrontendController::class, 'search'])->name('frontend.search');
Route::get('cart', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::get('order-complete/{order_no}', [FrontendController::class, 'completeOrder'])->name('frontend.order.complete');
Route::get('/inquire', [FrontendController::class, 'inquire'])->name('frontend.inquire');
Route::get('/inquire/success', [FrontendController::class, 'inquireSuccess'])->name('frontend.inquire.success');
// Route::get('user', [FrontendController::class, 'myAccount'])->name('frontend.user');
// Route::get('login', [FrontendController::class, 'login'])->name('frontend.login');

// Route::get('/hash/make', function () {
//       return Hash::make('admin1234');
// });

//     Artisan::call('storage:link');

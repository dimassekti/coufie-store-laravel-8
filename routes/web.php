<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('pages.home');
// });

// Route::get('/', 'HomeController@index')->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');


Route::get('/details/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [App\Http\Controllers\DetailController::class, 'add'])->name('detail-add');



Route::get('/success', [App\Http\Controllers\CartController::class, 'success'])->name('success');
Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');




Route::group(['middleware' => ['auth']], function () {

  Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
  Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart-delete');


  Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');


  Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

  Route::get('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'index'])->name('dashboard-product');

  Route::get('/dashboard/products/create', [App\Http\Controllers\DashboardProductController::class, 'create'])->name('dashboard-product-create');

  Route::post('/dashboard/products', [App\Http\Controllers\DashboardProductController::class, 'store'])->name('dashboard-product-store');


  Route::get('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'details'])->name('dashboard-product-details');

  Route::post('/dashboard/products/{id}', [App\Http\Controllers\DashboardProductController::class, 'update'])->name('dashboard-product-update');

  Route::post('/dashboard/gallery/upload', [App\Http\Controllers\DashboardProductController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');

  Route::get('/dashboard/gallery/delete/{id}', [App\Http\Controllers\DashboardProductController::class, 'deleteGallery'])->name('dashboard-product-gallery-delete');

  Route::get('/dashboard/transactions', [App\Http\Controllers\DashboardTransactionController::class, 'index'])->name('dashboard-transactions');
  Route::get('/dashboard/transactions/{id}', [App\Http\Controllers\DashboardTransactionController::class, 'details'])->name('dashboard-transactions-details');


  Route::get('/dashboard/settings', [App\Http\Controllers\DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
  Route::get('/dashboard/account', [App\Http\Controllers\DashboardSettingController::class, 'account'])->name('dashboard-settings-account');
});


// middleware(['auth', 'admin])->
Route::prefix('admin')->group(function () {
  Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
  Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
  Route::resource('user', App\Http\Controllers\Admin\UserController::class);
  Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
  Route::resource('product-gallery', App\Http\Controllers\Admin\ProductGalleryController::class);
});

// Route::prefix('admin')->group(function () {
//old laravel
// Route::get('/', 'DashboardController@index')->name('admin-dashboard');
//     Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
//     // Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin-dashboard');
// });

Auth::routes();

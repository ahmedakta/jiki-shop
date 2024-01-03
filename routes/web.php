<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;

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

// ***************** BACKEND ******************* //


// Route::get('/', function () {
//     return view('frontend/index');
// });

Route::get('/', [HomeController::class, 'index']);


Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Group for user-related routes with 'user' prefix
Route::group(['prefix' => 'user'], function () {
    // Route for user profile
    Route::get('profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('profile/edit', [ProfileController::class, 'index'])->name('user.profile.edit');
    // Profile Sections
    Route::get('orders', [ProfileController::class, 'index'])->name('user.orders');
    Route::get('payments', [ProfileController::class, 'index'])->name('user.payments');
    Route::get('addresses', [ProfileController::class, 'index'])->name('user.addresses');
});

// Group for blog-related routes with 'blog' prefix
Route::group(['prefix' => 'blogs'], function () {
    // Route for displaying all blogs
    Route::get('/', [PageController::class, 'index'])->name('blog.index');

    // Route for displaying a specific blog
    Route::get('{id}', [PageController::class, 'show'])->name('blog.show');
    // Add more blog-related routes here
});

// ********** Group For Products ****************
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
});
Route::get('/contact' , [PageController::class ,'contact'])->name('pages.contact');

// ********** Group for basket-related routes with 'cart' prefix *************
Route::group(['prefix' => 'cart'], function () {
    // Route for displaying all blogs
    Route::get('/', [ShoppingCartController::class, 'index'])->name('cart.index');
    Route::post('store', [ShoppingCartController::class, 'store'])->name('cart.store');
    Route::post('product/quantity', [ShoppingCartController::class, 'update'])->name('cart.update');

    // Route for displaying a specific blog
    Route::get('{id}', [PageController::class, 'show'])->name('blog.show');
    // Add more blog-related routes here
});


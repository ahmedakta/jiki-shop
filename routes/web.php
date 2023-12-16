<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Group for user-related routes with 'user' prefix
Route::group(['prefix' => 'user'], function () {
    // Route for user profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/orders', [ProfileController::class, 'index'])->name('user.orders');
    Route::get('/edit', [ProfileController::class, 'index'])->name('user.profile.edit');
    Route::get('/edit', [ProfileController::class, 'index'])->name('user.profile.edit');
});

// Group for blog-related routes with 'blog' prefix
Route::group(['prefix' => 'blogs'], function () {
    // Route for displaying all blogs
    Route::get('/', [PageController::class, 'index'])->name('blog.index');

    // Route for displaying a specific blog
    Route::get('/{id}', [PageController::class, 'show'])->name('blog.show');
    // Add more blog-related routes here
});


// Group for basket-related routes with 'cart' prefix
Route::group(['prefix' => 'cart'], function () {
    // Route for displaying all blogs
    Route::get('/cart', [PageController::class, 'index'])->name('blog.index');

    // Route for displaying a specific blog
    Route::get('/{id}', [PageController::class, 'show'])->name('blog.show');
    // Add more blog-related routes here
});


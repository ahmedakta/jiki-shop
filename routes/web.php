<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BlogController;

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
//     return view('frontend/index');
// });


// ********** AUTH ******************
Auth::routes();


// ********** Website Pages *********************
Route::get('/', [HomeController::class, 'index']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('contact' , [PageController::class ,'contact'])->name('pages.contact');

// Group for user-related routes with 'user' prefix
Route::group(['prefix' => 'user'], function () {
    // Route for user profile
    Route::get('profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('profile/edit', [ProfileController::class, 'index'])->name('user.profile.edit');
    Route::get('profile/paymentCards', [ProfileController::class, 'getUserPaymentCards'])->name('user.profile.paymentCards');
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

// ********** Group For Comments ****************

// ********** Group For Products ****************
Route::group(['prefix' => 'products'], function () {
    Route::delete('comments/{productId}/{commentId}/delete', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    // ************* Ajax Requests *******************
    Route::middleware(['api.token'])->group(function () {
        Route::get('{id}/comments', [CommentController::class, 'index']);
    });

    // TODO : DELETE THESE
    Route::post('cart/store', [ShoppingCartController::class, 'store'])->name('cart.store');
    Route::post('favorite/store', [FavoriteController::class, 'store'])->name('favorite.store');
    
    Route::post('store/comment' , [CommentController::class , 'store'])->name('comments.store');
});




// ********** Group for basket-related routes with 'cart' prefix *************
Route::group(['prefix' => 'cart'], function () {
    // Route for displaying all blogs
    Route::get('/', [ShoppingCartController::class, 'index'])->name('cart.index');
    Route::post('store', [ShoppingCartController::class, 'store'])->name('cart.store');
    Route::post('product/quantity', [ShoppingCartController::class, 'update'])->name('cart.update');

    Route::get('/checkout' , [ShoppingCartController::class , 'checkout'])->name('cart.checkout')->middleware('auth');
    
    // Route for displaying a specific blog
    Route::get('{id}', [PageController::class, 'show'])->name('blog.show');
    // Add more blog-related routes here

    // TODO : DELETE THESE
    Route::get('user/profile/paymentCards', [ProfileController::class, 'getUserPaymentCards'])->name('user.profile.paymentCards');

});

// ********** Group for favorites routes with 'favorite' prefix *************

Route::group(['prefix' => 'favorite'], function () {
    // Route for displaying all blogs
    Route::get('/', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::post('store', [FavoriteController::class, 'store'])->name('favorite.store');
    
});
// ********** Group for Compare Products routes with 'compare' prefix *************

Route::group(['prefix' => 'compare'], function () {
    // Route for displaying all blogs
    Route::get('/', [CompareController::class, 'index'])->name('compare.index');
    Route::post('store', [CompareController::class, 'store'])->name('compare.store');
    
});

Route::get('/favorites' , [FavoriteController::class , 'index'])->name('favorites.index');
Route::get('/profile/edit' , [ProfileController::class , 'edit'])->name('profile.edit');
Route::get('/profile/payments' , [ProfileController::class , 'payments'])->name('profile.payments');
Route::get('/profile/addresses' , [ProfileController::class , 'addresses'])->name('profile.addresses');
Route::get('/profile/change-password' , [ProfileController::class , 'changePassword'])->name('profile.change.password');
Route::post('/profile/update' , [ProfileController::class , 'update'])->name('profile.update');



// ******** BLOGS ************
Route::get('/blog' , [BlogController::class , 'index'])->name('blogs.index');
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StockController;

// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProductController::class, 'display']);


//Search
Route::get('/search', [ProductController::class, 'search']);


Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home')->middleware('verified');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Route for admin
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/products', [ProductController::class, 'list'])->name('products.list');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/users/list', [UserController::class, 'list'])->name('user.list');
    Route::get('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::get('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

    Route::get('/create-user', [UserController::class, 'create'])->name('create_user');
    Route::post('/register', [UserController::class, 'store'])->name('store_user');

    Route::get('/supplier/list',[SupplierController::class, 'list'])->name('supplier.list');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

    Route::get('/stock/list',[StockController::class, 'list'])->name('stock.list');
    Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
    Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
    Route::put('/stock/{stock}', [StockController::class, 'update'])->name('stock.update');
    Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit');
    Route::delete('/stock/{stock}', [StockController::class, 'destroy'])->name('stock.destroy');

    
    //USERS CRUD
    // Route::get('/users', [ProfileController::class, 'list'])->name('users.list');`
    //  Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('display');

    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::post('/orders', [OrderController::class, 'addToCart'])->name('order.addToCart');
    Route::get('/orders', [OrderController::class, 'cart'])->name('order.cart');
    Route::get('/transaction', [OrderController::class, 'transaction'])->name('order.transaction');

    Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/order/{order}/ship', [OrderController::class, 'ship'])->name('order.ship');
    Route::post('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

    Route::post('order/delivered/{id}', [OrderController::class, 'markAsDelivered'])->name('order.delivered');
    Route::post('order/failed/{id}', [OrderController::class, 'markAsFailed'])->name('order.failed');
    
    Route::get('/cancelled-orders', [OrderController::class, 'cancelledOrders'])->name('order.cancelled');
    Route::get('/review/create/{order_id}', [FeedbackController::class, 'index'])->name('review.create');
    Route::post('/review', [FeedbackController::class, 'store'])->name('feedback.store');

});

Route::get('/workspace', function () {
    return view('workspace');
});
 
// Route::get('/cart', 'CartController@index')->name('cart.blade.php');


require __DIR__.'/auth.php'; 

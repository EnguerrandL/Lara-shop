<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\InvoicePdfController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\StripeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





$slugRegex = '[0-9a-z\-]+';
$idRegex = '[0-9]+';


// Admin panel


Route::middleware('auth', 'is.admin')->group(function () {
    Route::resource('admin/products', ProductController::class);
    Route::get('admin/orders', [OrderController::class, 'index'])->name('order.index');
    Route::delete('admin/orders/{order}', [OrderController::class, 'deleteOrder'])->name('order.delete');
});

// Dashboard

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware('auth')->name('dashboard');

//Shop 

Route::get('/', [ShopController::class, 'index'])->name('shop.index');

Route::get('/{slug}-{product}', [ShopController::class, 'show'])->where([
    'slug' => $slugRegex,
    'product' => $idRegex,
])->name('product.show');


// cart 

Route::get('/cart/{user}', [CartController::class, 'cartShow'])->name('cart.show');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::delete('cart/{prudct}', [CartController::class, 'deleteItem'])->name('cart.remove');


//  Checkout & payment 

Route::post('/cart', [StripeController::class, 'checkout'])->name('order.payment');
Route::get('/order/{order}', [StripeController::class, 'customerOrder'])->name('order.success');


// Invoice 

Route::get('/invoice/{order}', [InvoicePdfController::class, 'makeInvoicePdf'])->name('make.invoice');

require __DIR__ . '/auth.php';

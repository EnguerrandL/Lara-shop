<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
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



$slugRegex = '[0-9a-z\-]+';
$idRegex = '[0-9]+';

//Shop 

Route::get('/', [ShopController::class, 'index'])->name('shop.index');

Route::get('/{slug}-{product}', [ShopController::class, 'show'])->where([
    'slug' => $slugRegex,
    'product' => $idRegex,
])->name('product.show');


 // cart 

 Route::get('/cart', [CartController::class, 'cartShow'])->name('cart.show');
 Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.addToCart');
 Route::delete('cart/{prudct}', [CartController::class, 'deleteItem'])->name('item.delete');


// Admin panel

Route::resource('admin/products', ProductController::class);


Route::get('admin/orders', [OrderController::class, 'index'])->name('order.index');
Route::delete('admin/orders/{order}', [OrderController::class ,'deleteOrder'])->name('order.delete');
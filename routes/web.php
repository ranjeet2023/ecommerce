<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\SMSLoginController;
use App\Http\Controllers\CartController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// user side route 
Route::get('/',[EcommerceController::class, 'index'])->name('home');
Route::get('/shop',[EcommerceController::class, 'shop'])->name('shop');
Route::get('/about',[EcommerceController::class, 'about'])->name('about');
Route::get('/service',[EcommerceController::class, 'service'])->name('service');
Route::get('/blog',[EcommerceController::class, 'blog'])->name('blog');
Route::get('/contact',[EcommerceController::class, 'contact'])->name('contact');
Route::get('/cart',[CartController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}',[CartController::class, 'AddCart'])->name('cart.add');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('checkout/{id}', [CartController::class, 'checkOut'])->name('checkout');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/sms-login', [SMSLoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/add', [ProductController::class, 'store'])->name('product.store');
});
Route::get('/user-login', [SMSLoginController::class, 'checkOut']);

require __DIR__.'/auth.php';

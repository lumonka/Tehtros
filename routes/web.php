<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\PaymentController;

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

Route::get('/', [WelcomeController::class, 'index'])->name("home");
Route::get('/index', [WelcomeController::class, 'index'])->name("index");
Route::get('/about-us', [AboutController::class, 'index'])->name("about");
Route::get('/services', [ServicesController::class, 'index'])->name("services");
Route::get('/news', [NewsController::class, 'index'])->name("news");
Route::get('/contacts', [ContactsController::class, 'index'])->name("contacts");

Route::match(['GET', 'POST'], '/payments/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::post('/payments/create', [PaymentController::class, 'create'])->name('payment.create');
Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');

Route::post('/password/email', [ProfileController::class, 'sendResetPasswordEmail'])->name('password.send');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name("admin.index");
    Route::get('/admin/services', [AdminController::class, 'servicesPage'])->name("admin.services");
    Route::get('/admin/orders', [AdminController::class, 'ordersPage'])->name("admin.orders");
    Route::get('/admin/news', [AdminController::class, 'newsPage'])->name("admin.news");
});

Route::middleware('auth')->group(function () {
    Route::get('/product/{product}', [ServicesController::class, 'show']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
    Route::post('/create-order', [OrdersController::class, 'createOrder'])->name('create-order');
    Route::delete('/order-delete/{number}', [OrdersController::class, 'deleteOrder']);
    Route::delete('/removeproduct/{id}', [CartController::class, 'deleteProductToCart'])->name("delete");
    Route::get('/changeqty/{param}/{id}', [CartController::class, 'changeQty']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/change-avatar', [ProfileController::class, 'changeAvatarIndex'])->name('profile.change-avatar');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MensagemController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $produtos = \App\Models\Product::all();
    return view('landing', compact('produtos'));
})->name('landing');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Rota do Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rotas de usuários
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    
    // Rotas de mensagens - Correção aqui
    Route::resource('mensagens', MensagemController::class)->only(['index', 'show']);
});

Route::post('/checkout/{product}', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/checkout/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/checkout/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
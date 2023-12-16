<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
// dashboard awal
Route::get('/', [UserController::class, 'index']);
Route::get('/events/{event}', [UserController::class, 'detail'])->name('events.detail');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'register'])->name('register')->middleware('guest');

// dashboard login
Route::middleware('auth')->group(function() {
    Route::get('/detail-pesanan/{payload}', [UserController::class, 'detailpesanan']);
    Route::post('/payment/{payload}', [UserController::class, 'payment'])->name('order.payment');
    Route::get('/transaksi', [UserController::class, 'transaksi']);
    Route::get('/tiket', [UserController::class, 'tiket']);
    Route::get('/edit-profile', [UserController::class, 'editprofile']);
    Route::get('/ganti-password', [UserController::class, 'changepwd']);
});

//  admin
Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/', [AdminController::class, 'user'])->name('admin.users');
    Route::put('/users/{user}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
    Route::get('/banners', [AdminController::class, 'banner'])->name('admin.banners');
    Route::post('/banners', [AdminController::class, 'bannerStore'])->name('admin.banners.store');
    Route::put('/banners/{banner}', [AdminController::class, 'bannerUpdate'])->name('admin.banners.update');
    Route::delete('/banners/{banner}', [AdminController::class, 'bannerDestroy'])->name('admin.banners.destroy');
    Route::get('/events', [AdminController::class, 'event'])->name('admin.events');
    Route::post('/events', [AdminController::class, 'eventStore'])->name('admin.events.store');
    Route::put('/events/{event}', [AdminController::class, 'eventUpdate'])->name('admin.events.update');
    Route::delete('/events/{event}', [AdminController::class, 'eventDestroy'])->name('admin.events.destroy');
    Route::get('/tickets', [AdminController::class, 'ticket'])->name('admin.tickets');
    Route::post('/tickets', [AdminController::class, 'ticketStore'])->name('admin.tickets.store');
    Route::put('/tickets/{ticket}', [AdminController::class, 'ticketUpdate'])->name('admin.tickets.update');
    Route::delete('/tickets/{ticket}', [AdminController::class, 'ticketDestroy'])->name('admin.tickets.destroy');
    Route::get('/tickets-selling', [AdminController::class, 'sell']);
    Route::get('/transaction', [AdminController::class, 'transaction'])->name('admin.transactions');
    Route::put('/transaction/{order}', [AdminController::class, 'transactionUpdate'])->name('admin.transactions.update');
    Route::delete('/transaction/{order}', [AdminController::class, 'transactionDestroy'])->name('admin.transactions.destroy');
});

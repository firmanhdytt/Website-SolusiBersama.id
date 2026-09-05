<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Kirim kontak (form di landing)
Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');

// ======================
// LOGIN
// ======================
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Jika bukan admin
Route::get('/access-denied', function () {
    return view('auth.access-denied');
})->name('access.denied');

// Dashboard (hanya admin)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// ======================
// ORDER
// ======================
Route::post('/order', [OrderController::class, 'send'])->name('order.send');
Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])
        ->name('orders.updateStatus');

    Route::patch('/orders/{order}/payment', [OrderController::class, 'updatePayment'])
        ->name('orders.updatePayment');

    Route::patch('/orders/{order}/deadline', [OrderController::class, 'updateDeadline'])
        ->name('orders.updateDeadline');
});

// ======================
// PROFILE
// ======================
Route::middleware(['auth'])->group(function () {

    // ================= PROFIL =================
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('dashboard.profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('dashboard.profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('dashboard.profile.update');

    Route::get('/profile/password', [ProfileController::class, 'password'])
        ->name('dashboard.profile.password');

    Route::post('/profile/password', [ProfileController::class, 'passwordUpdate'])
        ->name('dashboard.profile.password.update');
    
        Route::get('/forgot-password', function () {
    abort(404);
})->name('password.request');

        

});


// ======================
// PAYMENT
// ======================
Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/payments', [PaymentController::class, 'index'])
        ->name('payments.index');

    Route::get('/payments/{order}', [PaymentController::class, 'show'])
        ->name('payments.show');

    Route::post('/payments/{order}', [PaymentController::class, 'store'])
        ->name('payments.store');

    Route::get('/payments-export', [PaymentController::class, 'export'])
        ->name('payments.export');

    Route::get('/payments/{order}/export', [PaymentController::class, 'exportDetail'])
        ->name('payments.export.detail');
});

// ======================
// PROJECT
// ======================
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/calendar', [CalendarController::class, 'timeline'])
        ->name('calendar.timeline');

    Route::get('/calendar/events', [CalendarController::class, 'events'])
        ->name('calendar.events');
});

// ======================
// INFORMASI
// ======================
Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/clients', [ClientController::class, 'index'])
        ->name('clients.index');
    Route::get('/clients/{email}', [ClientController::class, 'show'])
        ->name('clients.show');
});



// ======================
// REPORT LAPORAN
// ======================
Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])
        ->name('reports.export.excel');

});


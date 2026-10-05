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
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

// ======================
// PUBLIC LANDING & ACTIONS
// ======================
Route::get('/', function () {
    return view('landing');
});

// Halaman Detail Layanan Publik
Route::prefix('layanan')->group(function () {
    Route::get('/website', [ServiceController::class, 'website'])->name('services.website');
    Route::get('/graphic-design', [ServiceController::class, 'graphicDesign'])->name('services.graphic-design');
    Route::get('/digital-marketing', [ServiceController::class, 'digitalMarketing'])->name('services.digital-marketing');
    Route::get('/application', [ServiceController::class, 'application'])->name('services.application');
    Route::get('/video', [ServiceController::class, 'video'])->name('services.video');
    Route::get('/seo', [ServiceController::class, 'seo'])->name('services.seo');
});

// Kirim kontak (form di landing) dengan rate limiting (max 10 request / menit)
Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:10,1')
    ->name('contact.send');

// Kirim pesanan (form di landing) dengan rate limiting (max 10 request / menit)
Route::post('/order', [OrderController::class, 'send'])
    ->middleware('throttle:10,1')
    ->name('order.send');

// ======================
// LOGIN & AUTH
// ======================
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Halaman Access Denied
Route::get('/access-denied', function () {
    return view('auth.access-denied');
})->name('access.denied');

// Redirection untuk password request
Route::get('/forgot-password', function () {
    return redirect()->route('login')->with('error', 'Silakan hubungi administrator untuk meriset kata sandi.');
})->name('password.request');

// ======================
// DASHBOARD (HANYA AUTH + ADMIN)
// ======================
Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {

    // Main Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Orders Management
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::patch('/orders/{order}/payment', [OrderController::class, 'updatePayment'])->name('orders.updatePayment');
    Route::patch('/orders/{order}/deadline', [OrderController::class, 'updateDeadline'])->name('orders.updateDeadline');

    // Payments Management
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments-export', [PaymentController::class, 'export'])->name('payments.export');
    Route::get('/payments/{order}', [PaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments/{order}', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{order}/export', [PaymentController::class, 'exportDetail'])->name('payments.export.detail');

    // Project Calendar / Timeline
    Route::get('/calendar', [CalendarController::class, 'timeline'])->name('calendar.timeline');
    Route::get('/calendar/events', [CalendarController::class, 'events'])->name('calendar.events');

    // Client Directory
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/{email}', [ClientController::class, 'show'])->name('clients.show');

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export-excel', [ReportController::class, 'exportExcel'])->name('reports.export.excel');

    // User Profile Management
    Route::get('/profile', [ProfileController::class, 'index'])->name('dashboard.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('dashboard.profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('dashboard.profile.update');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('dashboard.profile.password');
    Route::post('/profile/password', [ProfileController::class, 'passwordUpdate'])->name('dashboard.profile.password.update');
});

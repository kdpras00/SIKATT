<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Masyarakat\DashboardController as MasyarakatDashboardController;
use App\Http\Controllers\Lurah\DashboardController as LurahDashboardController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('public.layanan');
Route::get('/statistik', [HomeController::class, 'statistik'])->name('public.stats');

// Profile Routes
Route::prefix('profil')->name('profile.')->group(function () {
    Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/struktur', [HomeController::class, 'struktur'])->name('struktur');
    Route::get('/peta', [HomeController::class, 'peta'])->name('peta');
});
Route::get('/verify', [VerificationController::class, 'index'])->name('verification.index');
Route::post('/verify', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/verify/{hash}', [VerificationController::class, 'verifyByHash'])
    ->middleware('throttle:10,1')
    ->name('verification.verify.hash');
Route::get('/captcha/refresh', [VerificationController::class, 'refreshCaptcha'])->name('captcha.refresh');
Route::post('/verify/captcha', [VerificationController::class, 'submitCaptcha'])->name('verification.captcha.submit');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);


    // Password Reset Routes
    Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/notifications/count', [\App\Http\Controllers\NotificationController::class, 'unreadCount'])->name('notifications.count');
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [\App\Http\Controllers\NotificationController::class, 'markAllRead'])->name('notifications.readAll');


    // Profile Management
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Staff routes
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    
    // Letter Type management
    Route::resource('letter-types', \App\Http\Controllers\Staff\LetterTypeController::class);
    // Letter processing
    Route::get('/letters', [\App\Http\Controllers\Staff\LetterController::class, 'index'])->name('letters.index');
    Route::get('/letters/{letter}/process', [\App\Http\Controllers\Staff\LetterController::class, 'show'])->name('letters.show');
    // Route::get('/letters/{letter}/process', function () {
    //    return redirect()->route('staff.letters.index');
    // });
    Route::post('/letters/{letter}/process', [\App\Http\Controllers\Staff\LetterController::class, 'process'])->name('letters.process');
    Route::post('/letters/{letter}/reject', [\App\Http\Controllers\Staff\LetterController::class, 'reject'])->name('letters.reject');
    Route::get('/letters/{letter}/download', [\App\Http\Controllers\Staff\LetterController::class, 'download'])->name('letters.download');
    
    // Archive management
    Route::get('/archive', [\App\Http\Controllers\Staff\ArchiveController::class, 'index'])->name('archive.index');

    // User management
    Route::resource('users', \App\Http\Controllers\Staff\UserController::class);
});

// Masyarakat routes
Route::middleware(['auth', 'role:masyarakat'])->prefix('masyarakat')->name('masyarakat.')->group(function () {
    Route::get('/dashboard', [MasyarakatDashboardController::class, 'index'])->name('dashboard');
    
    // Letter requests
    Route::get('/letters', [\App\Http\Controllers\Masyarakat\LetterRequestController::class, 'index'])->name('letters.index');
    Route::get('/letters/create/{type}', [\App\Http\Controllers\Masyarakat\LetterRequestController::class, 'create'])->name('letters.create');
    Route::post('/letters', [\App\Http\Controllers\Masyarakat\LetterRequestController::class, 'store'])->name('letters.store');
    Route::get('/letters/{letter}/download', [\App\Http\Controllers\Masyarakat\LetterRequestController::class, 'download'])->name('letters.download');
});

// Lurah routes
Route::middleware(['auth', 'role:lurah'])->prefix('lurah')->name('lurah.')->group(function () {
    Route::get('/dashboard', [LurahDashboardController::class, 'index'])->name('dashboard');
    
    // Letter verification
    Route::get('/letters', [\App\Http\Controllers\Lurah\LetterVerificationController::class, 'index'])->name('letters.index');
    Route::get('/letters/{letter}', [\App\Http\Controllers\Lurah\LetterVerificationController::class, 'show'])->name('letters.show');
    Route::post('/letters/{letter}/verify', [\App\Http\Controllers\Lurah\LetterVerificationController::class, 'verify'])->name('letters.verify');
    Route::post('/letters/{letter}/reject', [\App\Http\Controllers\Lurah\LetterVerificationController::class, 'reject'])->name('letters.reject');
    // Report routes
    Route::get('/reports', [\App\Http\Controllers\Lurah\ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/print-letters', [\App\Http\Controllers\Lurah\ReportController::class, 'printLetters'])->name('reports.print-letters');
});

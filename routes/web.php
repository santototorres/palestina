<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\SignController;
use App\Http\Controllers\Public\SubmissionController;
use App\Http\Controllers\Public\ContentController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\VolunteerController;
use App\Http\Controllers\Public\ShopController;
use App\Http\Controllers\Public\DonateController;

// Redirect root to default language
Route::get('/', function () {
    return redirect('/it');
});

// Admin Routes (unlocalized)
Route::prefix('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    // We will add auth and specific routes in Phase 8/11
});

// Public Localized Routes
Route::prefix('{locale}')->group(function () {
    
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Signature Flow
    Route::prefix('firmar')->name('sign.')->group(function () {
        Route::get('/', [SignController::class, 'index'])->name('index');
        Route::get('/descargar', [SignController::class, 'download'])->name('download');
        Route::get('/solicitar-correo', [SignController::class, 'mailRequest'])->name('mail-request');
        Route::post('/solicitar-correo', [SignController::class, 'storeMailRequest']);
        Route::get('/subir-documento', [SubmissionController::class, 'upload'])->name('upload');
        Route::post('/subir-documento', [SubmissionController::class, 'store']);
    });
    
    // Other Pages
    Route::get('/faq', [ContentController::class, 'faq'])->name('faq');
    Route::get('/recursos', [ContentController::class, 'resources'])->name('resources');
    Route::get('/prensa', function () { return redirect()->route('resources'); })->name('press');
    Route::get('/comite', [ContentController::class, 'committee'])->name('committee');
    
    // Contact
    Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
    Route::post('/contacto', [ContactController::class, 'store']);
    
    // Volunteer
    Route::get('/ayudar', [VolunteerController::class, 'index'])->name('volunteer');
    Route::post('/ayudar', [VolunteerController::class, 'store']);
    
    // Shop
    Route::prefix('shop')->name('shop.')->group(function () {
        Route::get('/', [ShopController::class, 'index'])->name('index');
        Route::get('/solicitar', [ShopController::class, 'request'])->name('request');
        Route::post('/solicitar', [ShopController::class, 'store']);
    });
    
    // Donate
    Route::get('/donar', [DonateController::class, 'index'])->name('donate');
});

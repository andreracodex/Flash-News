<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'frontend'])->name('frontend');
Route::get('/iklan', [FrontendController::class, 'iklan'])->name('iklan');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/category', [FrontendController::class, 'category'])->name('kategori');
Route::get('/pedoman', [FrontendController::class, 'pedoman'])->name('pedoman');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('tentang');
Route::get('/redaksi', [FrontendController::class, 'redaksi'])->name('redaksi');
Route::get('/ketentuan', [FrontendController::class, 'ketentuan'])->name('ketentuan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

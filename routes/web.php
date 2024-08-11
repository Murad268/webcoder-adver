<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard')->middleware(
    'auth'
);
Route::get('/admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [LogoutController::class, 'logout'])->name('admin.logout');


Route::prefix('')->name('client.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/works', [WorkController::class, 'index'])->name('works');
    Route::get('/works/{slug}', [WorkController::class, 'work'])->name('work');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{slug}', [BlogController::class, 'blog'])->name('blog');
});

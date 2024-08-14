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
$repository = app(\Modules\MenuLinks\Repositories\MenuLinkRepository::class);

Route::prefix('')->name('client.')->group(function () use ($repository) {
    foreach ($repository->all() as $link) {
        if ($link->code == 'home') {
            Route::get('/', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name($link->code);
        } elseif ($link->code == 'about') {
            Route::get($link->slug, [AboutController::class, 'index'])->name($link->code);
        } elseif ($link->code == 'works') {
            Route::get($link->slug, [WorkController::class, 'index'])->name($link->code);
        } elseif ($link->code == 'work') {
            Route::get($link->slug. "/{slug}", [WorkController::class, $link->code])->name($link->code);
        } elseif ($link->code == 'blogs') {
            Route::get($link->slug, [BlogController::class, 'index'])->name($link->code);
        } elseif ($link->code == 'blog') {
            Route::get($link->slug . "/{slug}", [BlogController::class, $link->code])->name($link->code);
        } else {
            Route::get($link->slug, [AboutController::class, 'index'])->name($link->code);
        }
    }
});
Route::post('/contact/post', [\App\Http\Controllers\ContactFormController::class, 'post'])->name('contact.post');

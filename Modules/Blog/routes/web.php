<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => "admin", 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/blog', [BlogController::class, 'index'])->middleware('checkpermission:9,1')->name('blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->middleware('checkpermission:9,2')->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->middleware('checkpermission:9,2')->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->middleware('checkpermission:9,3')->name('blog.edit');
    Route::patch('/blog/{id}/update', [BlogController::class, 'update'])->middleware('checkpermission:9,3')->name('blog.update');
    Route::get('/blog/changeStatusFalse/{id}', [BlogController::class, 'changeStatusFalse'])->middleware('checkpermission:2,3')->name('blog.changeStatusFalse');
    Route::get('/blog/changeStatusTrue/{id}', [BlogController::class, 'changeStatusTrue'])->middleware('checkpermission:2,3')->name('blog.changeStatusTrue');
});

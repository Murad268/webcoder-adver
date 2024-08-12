<?php

use Illuminate\Support\Facades\Route;
use Modules\About\Http\Controllers\AboutController;

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

Route::group(['prefix' => "admin", 'middleware' => 'auth'], function () {
    Route::get('/about', [AboutController::class, 'index'])->middleware('checkpermission:11,1')->name('about.index');
    Route::get('/about/create', [AboutController::class, 'create'])->middleware('checkpermission:11,2')->name('about.create');
    Route::post('/about', [AboutController::class, 'store'])->middleware('checkpermission:11,2')->name('about.store');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->middleware('checkpermission:11,3')->name('about.edit');
    Route::patch('/about/{id}/update', [AboutController::class, 'update'])->middleware('checkpermission:11,3')->name('about.update');



    Route::get('/about/changeStatusFalse/{id}', [AboutController::class, 'changeStatusFalse'])->middleware('checkpermission:11,1')->name('about.changeStatusFalse');
    Route::get('/about/changeStatusTrue/{id}', [AboutController::class, 'changeStatusTrue'])->middleware('checkpermission:11,1')->name('about.changeStatusTrue');
    Route::get('/about/deleteFile/{id}', [AboutController::class, 'deleteFile'])->middleware('checkpermission:11,1')->name('about.deleteFile');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Work\Http\Controllers\WorkController;

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
    Route::get('/work', [WorkController::class, 'index'])->middleware('checkpermission:10,1')->name('work.index');
    Route::get('/work/create', [WorkController::class, 'create'])->middleware('checkpermission:10,2')->name('work.create');
    Route::post('/work', [WorkController::class, 'store'])->middleware('checkpermission:10,2')->name('work.store');
    Route::get('/work/{id}/edit', [WorkController::class, 'edit'])->middleware('checkpermission:10,3')->name('work.edit');
    Route::patch('/work/{id}/update', [WorkController::class, 'update'])->middleware('checkpermission:10,3')->name('work.update');

    Route::get('/work/changeStatusFalse/{id}', [WorkController::class, 'changeStatusFalse'])->middleware('checkpermission:10,3')->name('work.changeStatusFalse');
    Route::get('/work/changeStatusTrue/{id}', [WorkController::class, 'changeStatusTrue'])->middleware('checkpermission:10,3')->name('work.changeStatusTrue');
    Route::get('/work/deleteFile/{id}', [WorkController::class, 'deleteFile'])->middleware('checkpermission:10,3')->name('work.deleteFile');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Lang\Http\Controllers\LangController;

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
    Route::get('/lang', [LangController::class, 'index'])->middleware('checkpermission:2,1')->name('lang.index');
    Route::get('/lang/create', [LangController::class, 'create'])->middleware('checkpermission:2,2')->name('lang.create');
    Route::post('/lang', [LangController::class, 'store'])->middleware('checkpermission:2,2')->name('lang.store');
    Route::get('/lang/{id}/edit', [LangController::class, 'edit'])->middleware('checkpermission:2,3')->name('lang.edit');
    Route::patch('/lang/{id}/update', [LangController::class, 'update'])->middleware('checkpermission:2,3')->name('lang.update');
    Route::get('/lang/changeDefault/{id}', [LangController::class, 'changeDefault'])->middleware('checkpermission:2,3')->name('lang.changeDefault');
    Route::get('/lang/changeStatusFalse/{id}', [LangController::class, 'changeStatusFalse'])->middleware('checkpermission:2,3')->name('lang.changeStatusFalse');
    Route::get('/lang/changeStatusTrue/{id}', [LangController::class, 'changeStatusTrue'])->middleware('checkpermission:2,3')->name('lang.changeStatusTrue');
});

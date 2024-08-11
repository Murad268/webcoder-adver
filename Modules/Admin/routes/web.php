<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;

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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('admin', [AdminController::class, 'index'])->middleware('checkpermission:5,1')->name('index');
    Route::get('admin/create', [AdminController::class, 'create'])->middleware('checkpermission:5,2')->name('admin.create');
    Route::post('admin/store', [AdminController::class, 'store'])->middleware('checkpermission:5,2')->name('admin.store');
    Route::get('admin/{admin}/edit', [AdminController::class, 'edit'])->middleware('checkpermission:5,3')->name('edit');
    Route::match(['put', 'patch'], 'admin/{admin}', [AdminController::class, 'update'])->middleware('checkpermission:5,3')->name('admin.update');
    Route::patch('admin/{id}/updatePassword', [AdminController::class, 'updatePassword'])->middleware('checkpermission:5,3')->name('admin.updatePassword');

});

<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminMenuLinks\Http\Controllers\AdminMenuLinksController;

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'adminmenulinks.'], function () {
    Route::get('adminmenulinks', [AdminMenuLinksController::class, 'index'])->middleware('checkpermission:8,1')->name('index');
    Route::get('adminmenulinks/create', [AdminMenuLinksController::class, 'create'])->middleware('checkpermission:8,2')->name('create');
    Route::post('adminmenulinks', [AdminMenuLinksController::class, 'store'])->middleware('checkpermission:8,2')->name('store');
    Route::get('adminmenulinks/{adminmenulink}/edit', [AdminMenuLinksController::class, 'edit'])->middleware('checkpermission:8,3')->name('edit');
    Route::match(['put', 'patch'], 'adminmenulinks/{adminmenulink}/update', [AdminMenuLinksController::class, 'update'])->middleware('checkpermission:8,3')->name('update');

    Route::get('adminmenulinks/changeStatusFalse/{id}', [AdminMenuLinksController::class, 'changeStatusFalse'])->middleware('checkpermission:8,3')->name('changeStatusFalse');
    Route::get('adminmenulinks/changeStatusTrue/{id}', [AdminMenuLinksController::class, 'changeStatusTrue'])->middleware('checkpermission:8,3')->name('changeStatusTrue');
    Route::get('adminmenulinks/deleteFile/{id}', [AdminMenuLinksController::class, 'deleteFile'])->middleware('checkpermission:8,3')->name('deleteFile');
});

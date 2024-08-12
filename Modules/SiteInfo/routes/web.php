<?php

use Illuminate\Support\Facades\Route;
use Modules\SiteInfo\Http\Controllers\SiteInfoController;

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Resource routes for SiteInfo
    Route::get('siteinfo', [SiteInfoController::class, 'index'])->middleware('checkpermission:4,1')->name('siteinfo.index');
    Route::get('siteinfo/create', [SiteInfoController::class, 'create'])->middleware('checkpermission:4,2')->name('siteinfo.create');
    Route::post('siteinfo', [SiteInfoController::class, 'store'])->middleware('checkpermission:4,2')->name('siteinfo.store');
    Route::get('siteinfo/{siteinfo}/edit', [SiteInfoController::class, 'edit'])->middleware('checkpermission:4,3')->name('siteinfo.edit');
    Route::patch('siteinfo/{siteinfo}/update', [SiteInfoController::class, 'update'])->middleware('checkpermission:4,3')->name('siteinfo.update');


    Route::get('siteinfo/changeStatusFalse/{id}', [SiteInfoController::class, 'changeStatusFalse'])->middleware('checkpermission:4,3')->name('siteinfo.changeStatusFalse');
    Route::get('siteinfo/changeStatusTrue/{id}', [SiteInfoController::class, 'changeStatusTrue'])->middleware('checkpermission:4,3')->name('siteinfo.changeStatusTrue');
    Route::get('siteinfo/deleteFile/{id}', [SiteInfoController::class, 'deleteFile'])->middleware('checkpermission:4,3')->name('siteinfo.deleteFile');
});


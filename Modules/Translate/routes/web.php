<?php

use Illuminate\Support\Facades\Route;
use Modules\Translate\Http\Controllers\TranslateController;

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
    // Resource routes for Translate
    Route::get('translate', [TranslateController::class, 'index'])->middleware('checkpermission:3,1')->name('translate.index');
    Route::get('translate/create', [TranslateController::class, 'create'])->middleware('checkpermission:3,2')->name('translate.create');
    Route::post('translate', [TranslateController::class, 'store'])->middleware('checkpermission:3,2')->name('translate.store');
    Route::get('translate/{translate}/edit', [TranslateController::class, 'edit'])->middleware('checkpermission:3,3')->name('translate.edit');
    Route::patch('translate/{translate}.update', [TranslateController::class, 'update'])->middleware('checkpermission:3,3')->name('translate.update');

    // Additional route for deleting a file in Translate
    Route::get('translate/deleteFile/{id}', [TranslateController::class, 'deleteFile'])->middleware('checkpermission:3,3')->name('translate.deleteFile');
});

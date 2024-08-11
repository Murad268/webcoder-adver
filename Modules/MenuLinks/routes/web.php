<?php

use Illuminate\Support\Facades\Route;
use Modules\MenuLinks\Http\Controllers\MenuLinksController;

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
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('menulinks', [MenuLinksController::class, 'index'])->middleware('checkpermission:7,1')->name('menulinks.index');
    Route::get('menulinks/create', [MenuLinksController::class, 'create'])->middleware('checkpermission:7,2')->name('menulinks.create');
    Route::post('menulinks', [MenuLinksController::class, 'store'])->middleware('checkpermission:7,2')->name('menulinks.store');
    Route::get('menulinks/{menulink}/edit', [MenuLinksController::class, 'edit'])->middleware('checkpermission:7,3')->name('menulinks.edit');
    Route::match(['put', 'patch'], 'menulinks/{menulink}', [MenuLinksController::class, 'update'])->middleware('checkpermission:7,3')->name('menulinks.update');
});

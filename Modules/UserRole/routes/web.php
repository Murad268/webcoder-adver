<?php

use Illuminate\Support\Facades\Route;
use Modules\UserRole\Http\Controllers\UserPermissionController;
use Modules\UserRole\Http\Controllers\UserRoleController;

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
    // UserRole routes
    Route::get('userrole', [UserRoleController::class, 'index'])->middleware('checkpermission:6,1')->name('userrole.index');
    Route::get('userrole/create', [UserRoleController::class, 'create'])->middleware('checkpermission:6,2')->name('userrole.create');
    Route::post('userrole', [UserRoleController::class, 'store'])->middleware('checkpermission:6,2')->name('userrole.store');
    Route::get('userrole/{userrole}/edit', [UserRoleController::class, 'edit'])->middleware('checkpermission:6,3')->name('userrole.edit');
    Route::match(['put', 'patch'], 'userrole/{userrole}', [UserRoleController::class, 'update'])->middleware('checkpermission:6,3')->name('userrole.update');

    // UserPermission routes
    Route::get('permission/{role_id?}', [UserPermissionController::class, 'index'])->middleware('checkpermission:6,1')->name('permission.list');
    Route::get('permission/create/{role_id?}', [UserPermissionController::class, 'create'])->middleware('checkpermission:6,2')->name('permission.create');
    Route::post('permission/store/{role_id?}', [UserPermissionController::class, 'store'])->middleware('checkpermission:6,2')->name('permission.store');
    Route::get('permission/edit/{role_id?}/{page_id?}', [UserPermissionController::class, 'edit'])->middleware('checkpermission:6,3')->name('permission.edit');
    Route::post('permission/update/{role_id?}/{page_id?}', [UserPermissionController::class, 'update'])->middleware('checkpermission:6,3')->name('permission.update');
});

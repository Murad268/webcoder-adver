<?php

use Illuminate\Support\Facades\Route;
use Modules\Work\Http\Controllers\WorkController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('work', WorkController::class)->names('work');
});
Route::post('work/delete_selected_items', [WorkController::class, 'delete_selected_items'])->middleware('checkpermission:10,4')->middleware('web')->name('work.delete_selected_items');

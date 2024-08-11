<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('blog', BlogController::class)->names('blog');
});
Route::post('blog/delete_selected_items', [BlogController::class, 'delete_selected_items'])->middleware('checkpermission:9,4')->middleware('web')->name('blog.delete_selected_items');

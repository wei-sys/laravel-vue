<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::name('user.')->prefix('user')->group(function () {
    Route::post('add',          [UserController::class, 'create']);
    Route::put('edit',          [UserController::class, 'update']);
    Route::get('get',           [UserController::class, 'get']);
    Route::get('all',           [UserController::class, 'getList']);
    Route::delete('delete',     [UserController::class, 'destroy']);
});
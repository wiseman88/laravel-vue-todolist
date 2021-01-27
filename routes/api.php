<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', [ItemController::class, 'index'])->name('todoIndex');

Route::prefix('/item')->group(function() {
    Route::post('/store', [ItemController::class, 'store'])->name('todoStore');
    Route::put('/{id}', [ItemController::class, 'update'])->name('todoUpdate');
    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('todoDelete');
});

Route::get('/uploads', [FileController::class, 'index'])->name('uploadIndex');
Route::post('/upload', [FileController::class, 'upload'])->name('upload');

Route::prefix('/file')->group(function() {
    Route::delete('/{id}', [FileController::class, 'destroy'])->name('fielDelete');
});
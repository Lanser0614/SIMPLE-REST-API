<?php

use App\Http\Controllers\ProductController;
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
// Route::resource('product/add', ProductController::class);
Route::post('product/add', [ProductController::class, 'store']);
Route::get('product/index', [ProductController::class, 'index']);
Route::get('product/edit/{id}', [ProductController::class, 'edit']);
Route::post('product/index/update/{id}', [ProductController::class, 'update']);
Route::get('product/index/destroy/{id}', [ProductController::class, 'destroy']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

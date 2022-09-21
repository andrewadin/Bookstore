<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIControllers\BookController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::resource('books', BookController::class);
// Route::get('books', [BookController::class, 'index']);
// Route::get('books/{id}', [BookController::class, 'show']);
// Route::post('books', [BookController::class, 'store']);
// Route::put('books', [BookController::class, 'update']);
// Route::delete('books', [BookController::class, 'destroy']);

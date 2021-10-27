<?php

use App\Http\Controllers\Api\MovieController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('movies', MovieController::class)->only(['index', 'show', 'store', 'destroy']);
Route::get('movies-artists', [MovieController::class, 'getArtistsMovies']);
Route::get('movies-artists/filter', [MovieController::class, 'getFilterMovie']);


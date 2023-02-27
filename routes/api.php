<?php

use App\ShortenUrl\Infrastructure\ApiAdapters\ShortUrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('bearer')->prefix('v1')->group(function() {
    Route::post("/short-urls", [ShortUrlController::class, 'short']);
});

<?php

use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\SetController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserCardController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post("/import-data", function () {
    Artisan::call('app:import-data');
    return response()->json(['message' => 'Data import initiated.'], 200);
    
});

Route::get("/me/cards", [UserCardController::class, "index"]);
Route::post("/me/{id}/update-owned", [UserCardController::class, "updateOwned"]);

Route::get("/sets", [SetController::class, "index"]);
Route::get("/sets/{id}", [SetController::class, "single"]);
Route::get("/sets/{id}/cards", [SetController::class, "cards"]);

// Authentication routes

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);


// Card routes
Route::get('/cards', [CardController::class, 'index']);
Route::get('/cards/{id}', [CardController::class, 'single']);

// Wishlist routes (protected by auth middleware)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/wishlist/add', [WishlistController::class, 'add']);
    Route::post('/wishlist/remove', [WishlistController::class, 'remove']);
    Route::get('/wishlist', [WishlistController::class, 'list']);
});

// User routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

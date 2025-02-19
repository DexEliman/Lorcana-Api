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

Route::post("/wishlist/add", [WishlistController::class, "add"]);
Route::post("/wishlist/remove", [WishlistController::class, "remove"]);
Route::get("/wishlist", [WishlistController::class, "index"]);



// ROute pour l'authentification

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);


// Routes pour les carte
Route::get('/cards', [CardController::class, 'index']);
Route::get('/cards/{id}', [CardController::class, 'single']);



// Routes pour la wish list
Route::middleware('auth:sanctum')->post('/wishlist/add', [WishlistController::class, 'add']);
Route::middleware('auth:sanctum')->post('/wishlist/remove', [WishlistController::class, 'remove']);
Route::middleware('auth:sanctum')->get('/wishlist', [WishlistController::class, 'list']);

// route pour le user info
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

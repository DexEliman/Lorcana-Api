<?php

use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\SetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/register", [AuthController::class, "register"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::post("/login", [AuthController::class, "login"]);
Route::post("/logout", [AuthController::class, "logout"]);
Route::get("/me", [AuthController::class, "me"]);

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

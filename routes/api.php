<?php

use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\SetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::post("/logout", [AuthController::class, "logout"]);
Route::get("/me", [AuthController::class, "me"]);

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

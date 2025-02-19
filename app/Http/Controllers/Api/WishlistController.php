<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WishlistRequest;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class WishlistController extends Controller {
    public function add(WishlistRequest $request): JsonResponse {
        $request->user()->wishlist()->attach($request->card_id);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Card added to wishlist successfully'
        ], 201);
    }
    

    public function remove(WishlistRequest $request): JsonResponse {
        $request->user()->wishlist()->detach($request->card_id);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Card removed from wishlist successfully'
        ]);
    }
    

    public function list(Request $request): JsonResponse {
        $wishlist = $request->user()->wishlist()->paginate(15);
        
        return response()->json([
            'status' => 'success',
            'data' => $wishlist
        ]);
}
}

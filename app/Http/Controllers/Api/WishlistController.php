<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller {
    public function add(Request $request) {
        // verification du User
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        
        $userId = $request->user()->id;
    
        
        $request->validate(['card_id' => 'required|exists:cards,id']);
        
        // Ajout de la carte dans la wishlist
        $request->user()->wishlist()->attach($request->card_id);
        
        
        return response()->json(['message' => 'Carte ajoutée'], 201);
    }
    

    public function remove(Request $request) {
        
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $request->validate(['card_id' => 'required|exists:cards,id']);
        $request->user()->wishlist()->detach($request->card_id);
        return response()->json(['message' => 'carte enlevé']);
    }
    

    public function list(Request $request) {
       
        if (!$request->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        
        return response()->json($request->user()->wishlist);
}
}
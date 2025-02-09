<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        // Logic to add a card to the wishlist
        return response()->json(['message' => 'Card added to wishlist']);
    }

    public function remove(Request $request)
    {
        // Logic to remove a card from the wishlist
        return response()->json(['message' => 'Card removed from wishlist']);
    }

    public function index(Request $request)
    {
        // Logic to list all cards in the wishlist
        return response()->json(['wishlist' => $request->user()->wishlist]);
    }
}

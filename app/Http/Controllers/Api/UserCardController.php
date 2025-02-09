<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserCardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        return response()->json(['cards' => $user->cards]);
    }

    public function updateOwned(Request $request, $id)
    {
        $user = $request->user();
        // Logic to update the user's owned card
        return response()->json(['message' => 'Card updated successfully']);
    }
}

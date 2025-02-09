<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request)
    {
        // Logic to update user profile information
        return response()->json(['message' => 'User profile updated successfully']);
    }
}

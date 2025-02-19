<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    // Inscription d'un nouvel utilisateur
    public function register(RegisterRequest $request) {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'data' => [
                'token' => $user->createToken('API Token')->plainTextToken
            ]
        ], 201);
    }

    // Connexion d'un utilisateur
    public function login(LoginRequest $request) {
        $validated = $request->validated();

        if (!Auth::attempt($validated)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => [
                'token' => Auth::user()->createToken('API Token')->plainTextToken
            ]
        ]);
    }

    // Récupérer les informations de l'utilisateur connecté
    public function me(Request $request) {
        return response()->json([
            'status' => 'success',
            'data' => $request->user()
        ]);
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Logged out successfully'
        ]);
    }
}

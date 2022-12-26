<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\User as UserResource;
use App\Http\Requests\Auth\{Register as RegisterRequest, Login as LoginRequest};

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('token')->plainTextToken;

        return [
            'data' => new UserResource($user),
            'token' => $token
        ];
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $token = $request->user()->createToken('web')->plainTextToken;

        return [
            'data' => new UserResource($request->user()),
            'token' => $token
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'logged out'
        ];
    }
}

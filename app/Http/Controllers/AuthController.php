<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\support\Facades\JWTAUTH;
use Tymon\JWTAUTH\Facades\JWTAUTH;
use Tymon\JWTAUTH\Exceptions\JWTException;


class AuthController extends Controller
{
public fucntion register(RegisterRequest $request): JsonResponse
{
    try{
        $user = User::create ([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash($request->password),
        ]);
        $Token = JWTAUTH :: fromUser ($user);

        return response ()->json([
            'success' => true,
            'message'=> 'user registered succefully'
            'data' => [
                'user' => [
                    'id' => $user->id,
                    "email" =>$user->email,
                    'created_at' => $user ->created_at,
                ]
                'token' => $Token,
                'token_type' => 'bearer',
                'expires_in' => config ('jwt.ttl') * 60

            ]
                ],201);
                

        ]);

    }

}

}

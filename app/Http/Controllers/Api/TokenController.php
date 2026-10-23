<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Credenciais inválidas.',
            ], 401);
        }

        $token = Auth::user()->createToken('auth', expiresAt: now()->addDay())->plainTextToken;

        return new JsonResponse([
            'success' => true,
            'message' => 'Logado com sucesso.',
            'token' => $token,
        ], 201);
    }
}

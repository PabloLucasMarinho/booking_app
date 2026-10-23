<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
            'data' => [
                'type' => 'user',
                'id' => $request->user()->id,
                'attributes' => [
                    'name' => $request->user()->name,
                    'email' => $request->user()->email,
                ],
            ],
        ], 200);
    }
}

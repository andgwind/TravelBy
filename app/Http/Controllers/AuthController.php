<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\LoginAuthRequest;
use App\Http\Requests\V1\RegisterAuthRequest;
use App\Http\Resources\V1\UserResource;
use App\Services\Api\V1\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterAuthRequest $request) 
    {
        $user = $this->authService->register($request->all());

        return new UserResource($user);
    }

    public function login(LoginAuthRequest $request)
    {
        $userData = $this->authService->login($request->all());

        return response()->json([
            'token' => $userData['token'],

            'user' => new UserResource($userData['user'])
            ]
        );
    }
}

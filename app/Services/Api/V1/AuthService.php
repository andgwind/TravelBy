<?php

namespace App\Services\Api\V1;

use App\Repository\Api\V1\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService 
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($credentials) 
    {
        $user = $this->userRepository->create($credentials);
 
        return $user;
    }

    public function login($credentials) 
    {
        if (Auth::attempt($credentials)) {
            
            $user = $this->userRepository->findByEmail($credentials['email']);
            $token = $user->createToken('auth_token')->plainTextToken;

            return [
                'user' => $user,
                'token' => $token
            ];
            
        } else {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }
    }

    
}
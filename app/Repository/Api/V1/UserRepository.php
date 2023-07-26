<?php

namespace App\Repository\Api\V1;

use App\Models\User;

class UserRepository
{
    public function create($credentials)
    {
        return User::create($credentials);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}

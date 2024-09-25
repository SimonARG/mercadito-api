<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function createUser(object $data): object
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        return $user;
    }

    public function createToken(object $user): string
    {
        $token = $user->createToken('apiToken');
        $plainTextToken = $token->plainTextToken;

        return $plainTextToken;
    }
}
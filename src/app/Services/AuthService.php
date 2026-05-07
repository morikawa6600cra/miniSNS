<?php

namespace App\Services;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param array $data
     * @return User
     */
    public function register(array $data): User
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
                'user_id' => $data['user_id'],
                'password' => Hash::make($data['password']),
            ]);

            Profile::create([
                'user_id' => $user->id,
                'user_name' => $data['user_name'],
            ]);

            auth()->login($user);

            return $user->load('profile');
        });
    }
}

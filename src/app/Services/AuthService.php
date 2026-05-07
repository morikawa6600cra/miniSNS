<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * ユーザー登録処理
     */
    public function register(array $data): User
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
                'user_id' => $data['user_id'],
                'password' => Hash::make($data['password']),
            ]);

            $user->profile()->create([
                'user_name' => $data['user_name'],
            ]);

            Auth::login($user);

            return $user->load('profile');
        });
    }
}

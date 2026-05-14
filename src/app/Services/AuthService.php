<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

    public function login(array $data): User
    {
        $user = User::where('user_id', $data['user_id'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'user_id' => ['ログイン情報が正しくありません'],
            ]);
        }

        Auth::login($user);

        return $user->load('profile');
    }
}

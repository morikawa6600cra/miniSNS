<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AuthViewController extends Controller
{
    /**
     * @return Factory|View
     */
    public function register(): Factory|View
    {
        return view('auth.register');
    }

    /**
     * @return Factory|View
     */
    public function login(): Factory|View
    {
        return view('auth.login');
    }
}

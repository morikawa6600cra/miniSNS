<?php

use App\Http\Controllers\View\AuthViewController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthViewController::class, 'register'])->name('register');
Route::get('/login', [AuthViewController::class, 'login'])->name('login');

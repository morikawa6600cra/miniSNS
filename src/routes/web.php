<?php

use App\Http\Controllers\View\AuthViewController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthViewController::class, 'register'])->name('register');

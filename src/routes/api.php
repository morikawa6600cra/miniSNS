<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlockController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/search', [UserController::class, 'search']);
    Route::get('/users/{user_id}', [UserController::class, 'show']);
    Route::patch('/users', [UserController::class, 'update']);
    Route::delete('/users', [UserController::class, 'destroy']);

    Route::get('/users/{user_id}/posts', [UserController::class, 'posts']);
    Route::get('/users/{user_id}/likes', [UserController::class, 'likes']);


    Route::post('/users/{user_id}/follow', [FollowController::class, 'store']);
    Route::delete('/users/{user_id}/follow', [FollowController::class, 'destroy']);


    Route::post('/users/{user_id}/block', [BlockController::class, 'store']);
    Route::delete('/users/{user_id}/block', [BlockController::class, 'destroy']);


    Route::get('/posts/timeline', [PostController::class, 'timeline']);
    Route::get('/posts/search', [PostController::class, 'search']);
    Route::get('/posts/{post_id}', [PostController::class, 'show']);

    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/posts/{post_id}/replies', [PostController::class, 'reply']);
    Route::patch('/posts/{post_id}', [PostController::class, 'update']);
    Route::delete('/posts/{post_id}', [PostController::class, 'destroy']);


    Route::post('/posts/{post_id}/like', [LikeController::class, 'store']);
    Route::delete('/posts/{post_id}/like', [LikeController::class, 'destroy']);


    Route::get('/tags', [TagController::class, 'search']);
    Route::get('/tags/{tag_id}', [TagController::class, 'show']);


    Route::get('/notifications/count', [NotificationController::class, 'count']);
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::patch('/notifications/read', [NotificationController::class, 'read']);
});

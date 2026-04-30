<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'action_id',
        'post_id',
        'type',
        'read',
    ];

    // 通知を受け取るユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 行動したユーザー
    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'action_id');
    }

    // 対象投稿
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}

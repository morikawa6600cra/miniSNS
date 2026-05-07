<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'user_name',
        'bio',
        'avatar',
    ];

    // ユーザー（親）
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? asset('storage/' . $this->avatar)
            : null;
    }

    public function scopeSearch($query, $word)
    {
        return $query->where('user_name', 'like', "%{$word}%");
    }
}

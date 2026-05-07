<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'body',
        'quoted_id',
        'parent_id',
    ];

    // 投稿者
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 返信元（親）
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'parent_id');
    }

    // 返信一覧（子）
    public function replies(): HasMany
    {
        return $this->hasMany(Post::class, 'parent_id');
    }

    // 引用元
    public function quoted(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'quoted_id');
    }

    // この投稿が引用されている一覧
    public function quotedPosts(): HasMany
    {
        return $this->hasMany(Post::class, 'quoted_id');
    }

    // 画像
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    // いいね
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    // タグ
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}

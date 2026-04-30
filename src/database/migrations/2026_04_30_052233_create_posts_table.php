<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('body');

            // 返信（親）
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('posts')
                ->cascadeOnDelete();

            // 引用
            $table->foreignId('quoted_post_id')
                ->nullable()
                ->constrained('posts')
                ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            // インデックス（パフォーマンス）
            $table->index('user_id');
            $table->index('parent_id');
            $table->index('quoted_post_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

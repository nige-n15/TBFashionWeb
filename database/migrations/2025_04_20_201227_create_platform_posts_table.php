<?php

// database/migrations/xxxx_xx_xx_create_platform_posts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('platform_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('platform_config_id')->constrained()->onDelete('cascade');
            $table->string('post_type'); // 'social' or 'marketplace' or 'blog'
            $table->string('external_id')->nullable(); // ID from external platform
            $table->string('title')->nullable();
            $table->text('content');
            $table->json('media')->nullable(); // URLs to images or other media
            $table->json('metadata')->nullable(); // Additional platform-specific data
            $table->boolean('published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('platform_posts');
    }
};

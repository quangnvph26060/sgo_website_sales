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
        Schema::create('sgo_news', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable(); // Loại tin tức
            $table->string('logo', 255)->nullable(); // Đường dẫn logo
            $table->string('title', 255); // Tiêu đề tin tức
            $table->string('slug', 255)->nullable(); // Đường dẫn slug (URL thân thiện)
            $table->integer('author_id'); // ID tác giả (liên kết với bảng users)
            $table->longText('content'); // Nội dung tin tức
            $table->integer('views')->default(0); // Lượt xem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_news');
    }
};

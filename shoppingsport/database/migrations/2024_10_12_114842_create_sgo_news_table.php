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
            $table->id(); // Tạo trường id tự động
            $table->string('title'); // Trường tiêu đề
            $table->string('logo')->nullable(); // Trường logo (có thể null)
            $table->string('slug')->unique(); // Trường slug (phải là duy nhất)
            $table->foreignId('author_id')->constrained('users'); // Trường author_id, liên kết với bảng users
            $table->text('content'); // Trường nội dung
            $table->integer('views')->default(0); // Trường views, mặc định là 0
            $table->integer('count')->default(0); // Trường count, mặc định là 0
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

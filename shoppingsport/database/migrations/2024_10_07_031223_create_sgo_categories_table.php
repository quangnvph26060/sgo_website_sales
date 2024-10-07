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
        Schema::create('sgo_categories', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('name'); // Tên danh mục
            $table->text('description')->nullable(); // Mô tả danh mục
            $table->unsignedBigInteger('parent_id')->nullable(); // Tham chiếu đến id của bảng chính nó
            $table->foreign('parent_id')->references('id')->on('sgo_categories')->onDelete('cascade'); // Khóa ngoại tham chiếu đến chính bảng sgo_categories
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_categories');
    }
};

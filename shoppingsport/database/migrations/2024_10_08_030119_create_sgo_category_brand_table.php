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
        Schema::create('sgo_category_brand', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('category_id')->references('id')->on('sgo_categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('sgo_brands')->onDelete('cascade');

            // Đảm bảo không có bản ghi trùng lặp
            $table->unique(['category_id', 'brand_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_category_brand');
    }
};

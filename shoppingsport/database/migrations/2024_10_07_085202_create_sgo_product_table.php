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
        Schema::create('sgo_product', function (Blueprint $table) {
            $table->id(); // ID sản phẩm
            $table->string('name'); // Tên sản phẩm
            $table->string('slug')->unique(); // Slug (đường dẫn thân thiện với SEO)
            $table->integer('categori_id'); // ID danh mục
            $table->integer('brand_id'); // ID thương hiệu
            $table->integer('type_id'); // ID loại sản phẩm
            $table->string('color'); // Màu sắc
            $table->decimal('price_old', 10, 2)->nullable(); // Giá cũ
            $table->decimal('price_new', 10, 2)->nullable(); // Giá mới
            $table->text('description_short')->nullable(); // Mô tả ngắn
            $table->text('description')->nullable(); // Mô tả chi tiết
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_product');
    }
};

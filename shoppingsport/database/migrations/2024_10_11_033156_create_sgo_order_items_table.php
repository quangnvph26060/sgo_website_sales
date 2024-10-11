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
        Schema::create('sgo_order_items', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->integer('order_id'); // ID của đơn hàng (liên kết với bảng sgo_orders)
            $table->integer('product_id'); // ID sản phẩm (liên kết với bảng products)
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->timestamps(); // Các trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_order_items');
    }
};

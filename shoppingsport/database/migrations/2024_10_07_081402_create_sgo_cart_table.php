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
        Schema::create('sgo_cart', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); // ID của người dùng (nếu có)
            $table->integer('product_id'); // ID sản phẩm
            $table->integer('quantity')->default(1); // Số lượng sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_cart');
    }
};

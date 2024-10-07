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
        Schema::create('sgo_wishlist_product', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');  // ID của người dùng
            $table->integer('product_id'); // ID của sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_wishlist_product');
    }
};

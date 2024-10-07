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
        Schema::create('sgo_brands', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên thương hiệu
            $table->string('slug')->unique(); // Slug cho thương hiệu (đường dẫn thân thiện)
            $table->text('description')->nullable(); // Mô tả thương hiệu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_brands');
    }
};

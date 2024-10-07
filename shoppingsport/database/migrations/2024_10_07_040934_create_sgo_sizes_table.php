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
        Schema::create('sgo_sizes', function (Blueprint $table) {
            $table->id();
            $table->integer('size'); // Kích thước
            $table->string('type'); // Loại kích thước
            $table->string('label')->nullable(); // Nhãn cho kích thước
            $table->integer('type_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_sizes');
    }
};

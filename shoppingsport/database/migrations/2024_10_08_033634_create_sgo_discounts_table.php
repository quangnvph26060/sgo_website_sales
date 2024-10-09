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
        Schema::create('sgo_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Tên giảm giá
            $table->decimal('value', 5, 2)->nullable(); // Giá trị giảm giá (từ 0.00 đến 100.00 cho phần trăm)
            $table->date('start_date')->nullable(); // Ngày bắt đầu
            $table->date('end_date')->nullable(); // Ngày kết thúc
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_discounts');
    }
};

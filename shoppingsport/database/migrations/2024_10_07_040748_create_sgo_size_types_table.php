<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sgo_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên loại kích thước
            $table->timestamps();


            
        });

        // Thêm dữ liệu mẫu cho loại kích thước
        DB::table('sgo_types')->insert([
            ['name' => 'Giày'],
            ['name' => 'Quần áo'],
            ['name' => 'Bóng'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_types');
    }
};

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
        Schema::create('sgo_orders', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->string('name'); // Tên khách hàng
            $table->string('phone'); // Số điện thoại khách hàng
            $table->string('email')->nullable(); // Email khách hàng, có thể null
            $table->integer('ward_id'); // ID của phường, liên kết với bảng wards
            $table->string('address'); // Địa chỉ chi tiết
            $table->text('note')->nullable(); // Ghi chú đơn hàng, có thể null
            $table->integer('payment_method'); // Phương thức thanh toán
            $table->decimal('amount', 16, 0); // Tổng số tiền của đơn hàng
            $table->timestamps(); // Các trường created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_orders');
    }
};

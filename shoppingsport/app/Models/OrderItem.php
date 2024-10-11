<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'sgo_order_items'; // Tên bảng

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    protected $appends = ['product'] ;

    public function getProductAttribute()
    {
        return Product::where('id', $this->attributes['product_id'])->first();
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Quan hệ với bảng Product (nhiều-1)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

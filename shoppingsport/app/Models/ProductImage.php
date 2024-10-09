<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'sgo_product_images';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = [
        'product_id',
        'image',
    ];

    // Định nghĩa mối quan hệ với bảng Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'sgo_cart';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = ['user_id', 'product_id', 'quantity'];
}

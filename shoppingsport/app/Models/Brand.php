<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'sgo_brands';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = ['name', 'slug', 'description', 'logo'];
}

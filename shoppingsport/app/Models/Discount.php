<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'sgo_discounts';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = ['name', 'value', 'start_date', 'end_date'];
}

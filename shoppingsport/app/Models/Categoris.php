<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoris extends Model
{
    use HasFactory;
    protected $table = 'sgo_categories';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = ['name', 'description', 'parent_id'];
}

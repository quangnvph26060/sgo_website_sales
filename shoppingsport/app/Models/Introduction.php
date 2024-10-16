<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    use HasFactory;
    protected $table = 'sgo_introduction';

    // Khai báo các trường có thể điền dữ liệu (Mass Assignment)
    protected $fillable = [
        'title',
        'content',
    ];
}

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

    public function parent()
    {
        return $this->belongsTo(Categoris::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categoris::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'categori_id');
    }
}

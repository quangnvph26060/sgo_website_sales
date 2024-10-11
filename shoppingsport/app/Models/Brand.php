<?php

namespace App\Models;

use App\Models\Categoris;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'sgo_brands';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = ['name', 'slug', 'description', 'logo', 'title_seo', 'description_seo', 'keyword_seo'];
    public function categories()
    {
        return $this->belongsToMany(Categoris::class, 'sgo_category_brand', 'brand_id', 'category_id');
    }
}

<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoris extends Model
{
    use HasFactory;
    protected $table = 'sgo_categories';


    protected $fillable = ['name', 'description', 'parent_id', 'title_seo', 'description_seo', 'keyword_seo', 'logo'];

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'sgo_category_brand', 'category_id', 'brand_id');
    }

    public function categoryBrands()
    {
        return $this->hasMany(CategoryBrand::class, 'category_id');
    }

    // Phương thức để lấy tên thương hiệu từ bảng chung gian


    protected $appends = [ 'parent'];

    // Phương thức để lấy thông tin về cloud
    public function getParentAttribute()
    {
        return self::find($this->attributes['parent_id']);
    }

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

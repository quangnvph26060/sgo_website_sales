<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoris extends Model
{
    use HasFactory;
    protected $table = 'sgo_categories';

    // Các cột có thể gán giá trị hàng loạt
    protected $fillable = ['name', 'description', 'parent_id'];

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
}

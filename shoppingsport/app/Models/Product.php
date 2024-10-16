<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Categoris;
use App\Models\Discount;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = 'sgo_product';

    // Các cột có thể gán giá trị hàng loạt

    protected $fillable = [
        'name',
        'slug',
        'categori_id',
        'brand_id',
        'type_id',
        'color',
        'price_old',
        'quantity',
        'price_new',
        'discount_id',
        'description_short',
        'description',
        'title_seo',
        'description_seo',
        'keyword_seo'
    ];

    public function category()

    {
        return $this->belongsTo(Categoris::class, 'categori_id');
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function type()
    {
        return $this->belongsTo(TypeProduct::class, 'type_id');
    }



    public function discount()
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function discountValue(){
        return $this->belongsTo(Discount::class, 'discount_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    protected $appends = ['category', 'brand', 'type', 'discount', 'images'];

    public function getCategoryAttribute()
    {
        return Categoris::where('id', $this->attributes['categori_id'])->first();
    }

    public function getBrandAttribute()
    {
        return Brand::where('id', $this->attributes['brand_id'])->first();
    }

    public function getTypeAttribute()
    {
        return TypeProduct::where('id', $this->attributes['type_id'])->first();
    }

    public function getDiscountAttribute()
    {
        return Discount::where('id', $this->attributes['discount_id'])->first();
    }

    public function getImagesAttribute()
    {
        return ProductImage::where('product_id', $this->attributes['id'])->get();
    }
}

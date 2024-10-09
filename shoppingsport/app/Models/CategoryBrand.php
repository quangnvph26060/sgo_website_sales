<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBrand extends Model
{
    use HasFactory;

    protected $table = 'sgo_category_brand';

    protected $fillable = [
        'category_id',
        'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    protected $appends = ['brand'] ;

    public function getBrandAttribute()
    {
        return Brand::where('id', $this->attributes['brand_id'])->first();
    }
}

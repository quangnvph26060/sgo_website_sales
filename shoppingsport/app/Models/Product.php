<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'sgo_product';

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
        'description'
    ];

    public function categori()
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
}

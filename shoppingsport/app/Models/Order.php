<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'sgo_orders'; // Tên bảng

    protected $fillable = [
        'code',
        'name',
        'phone',
        'email',
        'province_id',
        'district_id',
        'ward_id',
        'address',
        'note',
        'payment_method',
        'amount',
        'is_active'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }


    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }


    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'sgo_order_items', 'order_id', 'product_id')->withPivot(['quantity', 'price'])->withTimestamps();
    }
}

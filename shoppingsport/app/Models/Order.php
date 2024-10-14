<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'sgo_orders'; // Tên bảng

    protected $fillable = [
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
        'active'
    ];

    protected $appends = ['province', 'district', 'ward', 'detail'] ;

    public function getProvinceAttribute()
    {
        return City::where('id', $this->attributes['province_id'])->first();
    }

    public function getDistrictAttribute()
    {
        return District::where('id', $this->attributes['district_id'])->first();
    }

    public function getWardAttribute()
    {
        return Ward::where('id', $this->attributes['ward_id'])->first();
    }

    public function getDetailAttribute()
    {
        return OrderItem::where('order_id', $this->attributes['id'])->get();
    }


}

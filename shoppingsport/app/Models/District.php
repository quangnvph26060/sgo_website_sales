<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table= "sgo_districts";
    protected $fillable = [
        'city_id',
        'name',
        'id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Quan hệ giữa District và Ward.
     * Một quận/huyện có nhiều phường/xã.
     */
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}

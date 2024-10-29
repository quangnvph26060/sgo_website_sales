<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use HasFactory;

    protected $table = 'warranties';

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->registration_date = now();
        });
    }


    protected $fillable = [
        'product_id',
        'customer_name',
        'phone_number',
        'address',
        'registration_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

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
        'ward_id',
        'address',
        'note',
        'payment_method',
        'amount',
    ];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table="sgo_wards";
    protected $fillable = [
        'district_id',
        'name',
        'id',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

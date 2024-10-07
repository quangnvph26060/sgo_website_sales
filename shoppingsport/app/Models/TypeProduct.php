<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;
    protected $table = 'sgo_types';

    protected $fillable = ['name'];

    protected $appends = ['size'];

    public function getSizeAttribute()
    {
        return Size::where('type_id', $this->attributes['id'])->get();
    }
}

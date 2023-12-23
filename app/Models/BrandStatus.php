<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'status',
        'message',
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}

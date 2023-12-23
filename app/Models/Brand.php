<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'owner',
        'logo_url',
        'certificate_url',
        'signature_url',
    ];
    
    public static function getPDKI(String $string) {
        $responses = Http::withHeaders([
            'Pdki-Signature' => 'PDKI/4716dc3d0b6f7c4b50216006783350031fde61cd3d69cddc3ff78fcc968ec27ac995d8e272d2e59df430af4fc33d0175bd45716163b5931586ce8f24cd86cc81'
        ])->get('https://pdki-indonesia.dgip.go.id/api/search?keyword='.$string.'&page=1&showFilter=true&type=trademark')->json();
        
        return $responses;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lastStatus() {
        return BrandStatus::where('brand_id', $this->id)->latest()->first();
    }

    public function statuses() {
        return $this->hasMany(BrandStatus::class);
    }
}

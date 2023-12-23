<?php

namespace Database\Seeders;

use App\Models\BrandStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandStatus::create([
            'brand_id' => 1,
            'status' => 'applied',
            'message' => 'tanda tangan tidak jelas, perlu perbaikan di bagian berkas'
        ]);

        BrandStatus::create([
            'brand_id' => 2,
            'status' => 'revision',
            'message' => 'tanda tangan tidak jelas, perlu perbaikan di bagian berkas'
        ]);
    
        BrandStatus::create([
            'brand_id' => 3,
            'status' => 'revised',
            'message' => 'berkas tidak sesuai dengan persyaratan yang belaku'
        ]);
    
        BrandStatus::create([
            'brand_id' => 4,
            'status' => 'accepted',
            'message' => 'berkas tidak sesuai dengan persyaratan yang belaku'
        ]);
    
        BrandStatus::create([
            'brand_id' => 5,
            'status' => 'rejected',
            'message' => 'berkas tidak sesuai dengan persyaratan yang belaku'
        ]);
    }
}

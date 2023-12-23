<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Riel',
            'user_id' => User::where('email', 'kenya@gmail.com')->first()->id,
            'address' => 'Jl. Dr. Fl. Thobing No. 59',
            'owner' => 'Elham Syahrian Putra',
            'logo_url' => 'assets/img/logo/logo-hki-uns.png',
            'signature_url' => 'assets/img/logo/logo-hki-uns.png',
        ]);

        Brand::create([
            'name' => 'Fuhrer',
            'user_id' => User::where('email', 'kenya@gmail.com')->first()->id,
            'address' => 'Ini Alamat',
            'owner' => 'Kenya',
            'logo_url' => 'assets/img/logo/logo-hki-uns.png',
            'signature_url' => 'assets/img/logo/logo-hki-uns.png',
        ]);

        Brand::create([
            'name' => 'CyneX',
            'user_id' => User::where('email', 'kenya@gmail.com')->first()->id,
            'address' => 'Test Alamat',
            'owner' => 'aefawf',
            'logo_url' => 'assets/img/logo/logo-hki-uns.png',
            'signature_url' => 'assets/img/logo/logo-hki-uns.png',
        ]);

        Brand::create([
            'name' => 'Disaster',
            'user_id' => User::where('email', 'kenya@gmail.com')->first()->id,
            'address' => 'Test Alamat',
            'owner' => 'aefawf',
            'logo_url' => 'assets/img/logo/logo-hki-uns.png',
            'signature_url' => 'assets/img/logo/logo-hki-uns.png',
        ]);

        Brand::create([
            'name' => 'hey',
            'user_id' => User::where('email', 'kenya@gmail.com')->first()->id,
            'address' => 'Test Alamat',
            'owner' => 'aefawf',
            'logo_url' => 'assets/img/logo/logo-hki-uns.png',
            'signature_url' => 'assets/img/logo/logo-hki-uns.png',
        ]);
    }
}

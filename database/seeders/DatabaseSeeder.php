<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BrandStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // * Permission and Role

        $this->call([
            RoleSeeder::class,
        ]);
        
        // * Users
        $this->call([
            UserSeeder::class,
        ]);

        // * Brands
        $this->call([
            BrandSeeder::class,
            BrandStatusSeeder::class
        ]);

    }
}

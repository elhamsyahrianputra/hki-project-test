<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwertyui'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Elham Syahrian Putra',
            'email' => 'elham@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwertyui'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Kenya Fuhrer',
            'email' => 'kenya@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwertyui'),
        ])->assignRole('applicant');

        User::create([
            'name' => 'Angelina Christy',
            'email' => 'Christy@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('qwertyui'),
        ])->assignRole('applicant');

    }
}

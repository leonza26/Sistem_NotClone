<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'System God',
            'email' => 'admin@flowral.com',
            'password' => Hash::make('l30nz426'), // Silakan ganti jika mau 
            'role' => 0, // 0 = Admin 
            'job_title' => 'Super Administrator',
            'email_verified_at' => now(), // Bypass middleware 'verified'
        ]);
    }
}

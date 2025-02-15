<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            
        ])->assignRole('admin');
    }
}
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

        if(User::where('email', 'admin@boomerang.com')->exists()) {
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin@boomerang.com',
            'password' => Hash::make('password123'),
        ]);
    }
}

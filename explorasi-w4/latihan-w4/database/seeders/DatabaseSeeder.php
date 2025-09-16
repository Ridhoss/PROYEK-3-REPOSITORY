<?php

namespace Database\Seeders;

use App\Models\students;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'username' => 'admin',
                'password' => Hash::make('123'),
                'full_name' => 'Ridho Sulistyo Saputro',
                'tgl_lahir' => '2006-02-13',
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

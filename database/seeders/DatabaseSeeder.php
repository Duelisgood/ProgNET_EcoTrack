<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun ADMIN
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@ecotrack.id',
            'role' => 'admin', // <-- Ini yang penting
            'password' => Hash::make('eco123'), // Password admin
        ]);

        // 2. Buat Akun USER BIASA (Contoh)
        User::create([
            'name' => 'Budi Warga',
            'email' => 'budi@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Pasek',
            'email' => 'igpsurya06@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Marsel',
            'email' => 'marcellsantoso69@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);
    }
}
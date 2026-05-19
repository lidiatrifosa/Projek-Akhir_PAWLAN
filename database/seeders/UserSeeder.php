<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Admin KampusInfo',
            'email' => 'admin@kampusinfo.ac.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Mahasiswa Demo',
            'email' => 'mahasiswa@kampusinfo.ac.id',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
        ]);
    }
}

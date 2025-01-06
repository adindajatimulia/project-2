<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = User::create([
            'name' => 'manajemen',
            // 'username' => 'root',
            'email' => 'manajemen@gmail.com',
            'password' => Hash::make('1234')
        ])->assignRole('Manajemen');
        $superadmin = User::create([
            'name' => 'Admin',
            // 'username' => 'superadmin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234')
        ])->assignRole('Admin');
        $admin = User::create([
            'name' => 'Kitchen',
            // 'username' => 'admin',
            'email' => 'kitchen@gmail.com',
            'password' => Hash::make('1234')
        ])->assignRole('Kitchen');
    }
}

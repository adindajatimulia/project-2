<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Manajemen = Role::create([
            'name' => 'Manajemen',
            'guard_name' => 'web',
        ]);
        $Admin = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        $Kitchen = Role::create([
            'name' => 'Kitchen',
            'guard_name' => 'web',
        ]);

        $Manajemen->givePermissionTo([
            'read-dashboard',
        ]);
        $Admin->givePermissionTo([
            'read-dashboard',
            'read-users',
        ]);
        $Kitchen->givePermissionTo([
            'read-dashboard',
        ]);
    }
}

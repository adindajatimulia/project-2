<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Collection;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $webPermission = collect([
            # Dashboard related permission
            ['name' => 'read-dashboard', 'label' => 'Read Dashboard'],
            # Roles related permission
            ['name' => 'read-roles', 'label' => 'Read Role'],
            ['name' => 'change-permissions', 'label' => 'Change Permission'],
            # Users related permission
            ['name' => 'read-users', 'label' => 'Read User'],
            ['name' => 'create-users', 'label' => 'Create User'],
            ['name' => 'update-users', 'label' => 'Update User'],
            ['name' => 'delete-users', 'label' => 'Delete User'],
        ]);

        $this->insertPermission($webPermission);
    }

    private function insertPermission(Collection $permissions, $guardName = 'web')
    {
        Permission::insert($permissions->map(function ($permission) use ($guardName) {
            return [
                'name' => $permission['name'],
                'display_name' => $permission['label'],
                'guard_name' => $guardName,
            ];
        })->toArray());
    }
}

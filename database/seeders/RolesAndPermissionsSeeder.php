<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        $permissions = [
            ['name' => 'manage_users', 'description' => 'Manage Users'],
            ['name' => 'view_reports', 'description' => 'View Reports'],
            ['name' => 'edit_profile', 'description' => 'Edit Profile']
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $admin = Role::create(['name' => 'Admin', 'description' => 'Administrator']);
        $manager = Role::create(['name' => 'Manager', 'description' => 'Manager']);
        $user = Role::create(['name' => 'User', 'description' => 'Regular User']);


        $admin->permissions()->sync(Permission::all()->pluck('id')); 

        $manager->permissions()->sync(
            Permission::whereIn('name', ['view_reports', 'edit_profile'])->pluck('id')
        );

        $user->permissions()->sync(
            Permission::where('name', 'view_reports')->pluck('id')
        );

    }
}

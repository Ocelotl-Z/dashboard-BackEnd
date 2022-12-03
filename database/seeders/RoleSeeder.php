<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);

        // Dashboard
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        // Users
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.view'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);

        // Permission::create(['name' => 'admin.']);
        // Permission::create(['name' => 'admin.']);
        // Permission::create(['name' => 'admin.']);
        // Permission::create(['name' => 'admin.']);
        // Permission::create(['name' => 'admin.']);
        // Permission::create(['name' => 'admin.']);


        $arrayOfRoleNames = ['Admin', 'Cajero', 'Gerente','Cliente','Empleado'];
        $roles = collect($arrayOfRoleNames)->map(function ($role) {
            return ['name' => $role, 'guard_name' => 'company', 'created_at' => now(), 'updated_at' => now()];
        });

        Role::insert($roles->toArray());
    }
}

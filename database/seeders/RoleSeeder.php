<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Empleado']);

        $permiso1 = Permission::create(['name' => 'Administrador']);
        $permiso2 = Permission::create(['name' => 'Empleado']);

        $permiso1->assignRole($role1);
        $permiso2->assignRole($role2);
        
    }
}

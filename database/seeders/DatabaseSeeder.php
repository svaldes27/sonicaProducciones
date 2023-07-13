<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear permisos para el rol "administrador"
        $roleAdmin = Role::where('name', 'administrador')->first();
        
        $permissions = [
            'representante.create',
            'representante.destroy',
            'representante.update',
            'representante.edit',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
            $roleAdmin->givePermissionTo($permission);
            
        }
    }
}

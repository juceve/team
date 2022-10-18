<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperUsuario']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'home','grupo' => 'Home','description' => 'Ver el dashboard'])->syncRoles([$role1,$role2,$role3]);

        Permission::create(['name' => 'users.index','grupo' => 'Usuarios','description' => 'Ver lista usuarios'])->syncRoles([$role1,$role2]);        
        Permission::create(['name' => 'users.edit','grupo' => 'Usuarios','description' => 'Asignar roles a usuarios'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'roles.index','grupo' => 'Roles','description' => 'Ver listado roles'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.create','grupo' => 'Roles','description' => 'Crear'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.edit','grupo' => 'Roles','description' => 'Editar'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'roles.destroy','grupo' => 'Roles','description' => 'Eliminar'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'asociados.index','grupo' => 'Asociados','description' => 'Ver listado asociados'])->syncRoles([$role1]);
        Permission::create(['name' => 'asociados.create','grupo' => 'Asociados','description' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'asociados.edit','grupo' => 'Asociados','description' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'asociados.destroy','grupo' => 'Asociados','description' => 'Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'asociados.deleted','grupo' => 'Asociados','description' => 'Eliminados'])->syncRoles([$role1]);

        Permission::create(['name' => 'grados.index','grupo' => 'Grados','description' => 'Ver listado grados'])->syncRoles([$role1]);
        Permission::create(['name' => 'grados.create','grupo' => 'Grados','description' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'grados.edit','grupo' => 'Grados','description' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'grados.destroy','grupo' => 'Grados','description' => 'Eliminar'])->syncRoles([$role1]);

        Permission::create(['name' => 'parentezcos.index','grupo' => 'Parentezco','description' => 'Ver listado parentezcos'])->syncRoles([$role1]);
        Permission::create(['name' => 'parentezcos.create','grupo' => 'Parentezco','description' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'parentezcos.edit','grupo' => 'Parentezco','description' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'parentezcos.destroy','grupo' => 'Parentezco','description' => 'Eliminar'])->syncRoles([$role1]);

        Permission::create(['name' => 'vinculos.manage','grupo' => 'Vinculos','description' => 'Administrar vinculos'])->syncRoles([$role1]);

        Permission::create(['name' => 'estados.index','grupo' => 'Estados','description' => 'Ver listado estados'])->syncRoles([$role1]);
        Permission::create(['name' => 'estados.create','grupo' => 'Estados','description' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'estados.edit','grupo' => 'Estados','description' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'estados.destroy','grupo' => 'Estados','description' => 'Eliminar'])->syncRoles([$role1]);

        Permission::create(['name' => 'directorios.index','grupo' => 'Directorios','description' => 'Ver listado directorios'])->syncRoles([$role1]);
        Permission::create(['name' => 'directorios.create','grupo' => 'Directorios','description' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'directorios.edit','grupo' => 'Directorios','description' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'directorios.destroy','grupo' => 'Directorios','description' => 'Eliminar'])->syncRoles([$role1]);
        Permission::create(['name' => 'directorios.integrantes','grupo' => 'Directorios','description' => 'Integrantes'])->syncRoles([$role1]);

        Permission::create(['name' => 'eventos.index','grupo' => 'Eventos','description' => 'Ver listado eventos'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'eventos.create','grupo' => 'Eventos','description' => 'Crear'])->syncRoles([$role1]);
        Permission::create(['name' => 'eventos.edit','grupo' => 'Eventos','description' => 'Editar'])->syncRoles([$role1]);
        Permission::create(['name' => 'eventos.destroy','grupo' => 'Eventos','description' => 'Eliminar'])->syncRoles([$role1]);
    }
}

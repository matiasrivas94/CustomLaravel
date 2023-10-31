<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roleAdmin      = Role::create(['name' => 'Admin']);
        $roleBlogger    = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home',
                            'description' => 'Ver el dashboard'])->syncRoles([$roleAdmin, $roleAdmin]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'Ver panel de usuarios'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Asignar un rol'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'posts.index',
                            'description' => 'Ver listaro de posts'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.create',
                            'description' => 'Crear post'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.show',
                            'description' => 'Ver post'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.edit',
                            'description' => 'Editar post'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.destroy',
                            'description' => 'Eliminar post'])->syncRoles([$roleBlogger]);

        Permission::create(['name' => 'categories.index',
                            'description' => 'Ver listaro de categorias'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.create',
                            'description' => 'Crear categoria'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.show',
                            'description' => 'Ver categoria'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.edit',
                            'description' => 'Editar categoria'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.destroy',
                            'description' => 'Eliminar categoria'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'tags.index',
                            'description' => 'Ver listado de etiquetas'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.create',
                            'description' => 'Crear etiqueta'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.show',
                            'description' => 'Ver etiqueta'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.edit',
                            'description' => 'Editar etiqueta'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.destroy',
                            'description' => 'Eliminar etiqueta'])->syncRoles([$roleAdmin]);
    }
    //php artisan db:seed --class=RoleSeeder
}

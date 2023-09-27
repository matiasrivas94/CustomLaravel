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

        Permission::create(['name' => 'posts.index']);
        Permission::create(['name' => 'posts.create']);
        Permission::create(['name' => 'posts.show']);
        Permission::create(['name' => 'posts.edit']);
        Permission::create(['name' => 'posts.destroy']);

        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.show']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.destroy']);

        Permission::create(['name' => 'tags.index']);
        Permission::create(['name' => 'tags.create']);
        Permission::create(['name' => 'tags.show']);
        Permission::create(['name' => 'tags.edit']);
        Permission::create(['name' => 'tags.destroy']);
    }
    //php artisan db:seed --class=RoleSeeder
}

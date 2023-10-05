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

        Permission::create(['name' => 'admin.home'])->syncRoles([$roleAdmin, $roleAdmin]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'posts.index'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.create'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.show'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.edit'])->syncRoles([$roleBlogger]);
        Permission::create(['name' => 'posts.destroy'])->syncRoles([$roleBlogger]);

        Permission::create(['name' => 'categories.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'tags.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.show'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'tags.destroy'])->syncRoles([$roleAdmin]);
    }
    //php artisan db:seed --class=RoleSeeder
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create event']);
        Permission::create(['name' => 'read event']);
        Permission::create(['name' => 'update event']);
        Permission::create(['name' => 'delete event']);
        Permission::create(['name' => 'register event']);
        

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create event');
        $role->givePermissionTo('read event');
        $role->givePermissionTo('update event');
        $role->givePermissionTo('delete event');

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('read event');
        $role->givePermissionTo('register event');

        // $role = Role::create(['name' => 'guest']);
        // $role->givePermissionTo('read event');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

    


        
    }
}

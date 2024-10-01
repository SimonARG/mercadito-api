<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Own publications
        Permission::create(['name' => 'store own publications']);
        Permission::create(['name' => 'read own publications']);
        Permission::create(['name' => 'update own publications']);
        Permission::create(['name' => 'destroy own publications']);
        
        // All publications
        Permission::create(['name' => 'store all publications']);
        Permission::create(['name' => 'read all publications']);
        Permission::create(['name' => 'update all publications']);
        Permission::create(['name' => 'destroy all publications']);

        // Own comments
        Permission::create(['name' => 'store own comments']);
        Permission::create(['name' => 'read own comments']);
        Permission::create(['name' => 'update own comments']);
        Permission::create(['name' => 'destroy own comments']);
        
        // All comments
        Permission::create(['name' => 'store all comments']);
        Permission::create(['name' => 'read all comments']);
        Permission::create(['name' => 'update all comments']);
        Permission::create(['name' => 'destroy all comments']);

        // Own lists
        Permission::create(['name' => 'store own lists']);
        Permission::create(['name' => 'read own lists']);
        Permission::create(['name' => 'update own lists']);
        Permission::create(['name' => 'destroy own lists']);
        
        // All lists
        Permission::create(['name' => 'store all lists']);
        Permission::create(['name' => 'read all lists']);
        Permission::create(['name' => 'update all lists']);
        Permission::create(['name' => 'destroy all lists']);

        // Own favorites
        Permission::create(['name' => 'store own favorites']);
        Permission::create(['name' => 'read own favorites']);
        Permission::create(['name' => 'update own favorites']);
        Permission::create(['name' => 'destroy own favorites']);
        
        // All favorites
        Permission::create(['name' => 'store all favorites']);
        Permission::create(['name' => 'read all favorites']);
        Permission::create(['name' => 'update all favorites']);
        Permission::create(['name' => 'destroy all favorites']);

        // Own ratings
        Permission::create(['name' => 'store own ratings']);
        Permission::create(['name' => 'read own ratings']);
        Permission::create(['name' => 'update own ratings']);
        Permission::create(['name' => 'destroy own ratings']);
        
        // All ratings
        Permission::create(['name' => 'store all ratings']);
        Permission::create(['name' => 'read all ratings']);
        Permission::create(['name' => 'update all ratings']);
        Permission::create(['name' => 'destroy all ratings']);

        // update cache to know about the newly created permissions (required if using WithoutModelEvents in seeders)
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
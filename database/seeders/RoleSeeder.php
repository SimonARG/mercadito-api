<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $banned = Role::create(['name' => 'banned']);
        $guest = Role::create(['name' => 'guest']);
        $free = Role::create(['name' => 'free']);
        $basic = Role::create(['name' => 'basic']);
        $premium = Role::create(['name' => 'premium']);
        $mod = Role::create(['name' => 'mod']);
        $admin = Role::create(['name' => 'admin']);

        // Define permissions for each role
        $guestPermissions = [
            'read all publications',
            'read all comments',
            'read all ratings',
        ];

        $freePermissions = [
            'read all publications',
            'store own comments',
            'read own comments',
            'update own comments',
            'destroy own comments',
            'read all comments',
            'read all ratings',
        ];

        $basicPermissions = [
            'read all publications',
            'store own publications',
            'read own publications',
            'update own publications',
            'destroy own publications',
            'store own comments',
            'read own comments',
            'update own comments',
            'destroy own comments',
            'read all comments',
            'store own lists',
            'read own lists',
            'update own lists',
            'destroy own lists',
            'store own favorites',
            'read own favorites',
            'update own favorites',
            'destroy own favorites',
            'store own ratings',
            'read own ratings',
            'update own ratings',
            'destroy own ratings',
            'read all ratings',
        ];

        $premiumPermissions = [
            'read all publications',
            'store own publications',
            'read own publications',
            'update own publications',
            'destroy own publications',
            'store own comments',
            'read own comments',
            'update own comments',
            'destroy own comments',
            'read all comments',
            'store own lists',
            'read own lists',
            'update own lists',
            'destroy own lists',
            'store own favorites',
            'read own favorites',
            'update own favorites',
            'destroy own favorites',
            'store own ratings',
            'read own ratings',
            'update own ratings',
            'destroy own ratings',
            'read all ratings',
        ];

        $modPermissions = [
            'store all publications',
            'read all publications',
            'update all publications',
            'destroy all publications',
            'store all comments',
            'read all comments',
            'update all comments',
            'destroy all comments',
            'store all lists',
            'read all lists',
            'update all lists',
            'destroy all lists',
            'store all favorites',
            'read all favorites',
            'update all favorites',
            'destroy all favorites',
            'store all ratings',
            'read all ratings',
            'update all ratings',
            'destroy all ratings',
        ];

        $adminPermissions = [
            'store all publications',
            'read all publications',
            'update all publications',
            'destroy all publications',
            'store all comments',
            'read all comments',
            'update all comments',
            'destroy all comments',
            'store all lists',
            'read all lists',
            'update all lists',
            'destroy all lists',
            'store all favorites',
            'read all favorites',
            'update all favorites',
            'destroy all favorites',
            'store all ratings',
            'read all ratings',
            'update all ratings',
            'destroy all ratings',
        ];

        // Assign permissions to roles
        $guest->syncPermissions($guestPermissions);
        $free->syncPermissions($freePermissions);
        $basic->syncPermissions($basicPermissions);
        $premium->syncPermissions($premiumPermissions);
        $mod->syncPermissions($modPermissions);
        $admin->syncPermissions($adminPermissions);

        // Set up super-admin
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(10)->create();

        foreach ($users as $key => $user) {
            $user->assignRole('free');
        }

        $admin = User::factory()->create([
            'name' => 'superadmin',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('58dZ,JPM[o1Mh-mP'),
            'remember_token' => Str::random(10),
        ]);

        $admin->assignRole('super-admin');
    }
}
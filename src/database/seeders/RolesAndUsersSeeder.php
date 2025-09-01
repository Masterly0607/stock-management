<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolesAndUsersSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['super_admin', 'admin', 'distributor'] as $name) {
            Role::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        $super = User::firstOrCreate(
            ['email' => 'super@itcstock.local'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), //  change in prod
            ]
        );
        $super->assignRole('super_admin');
    }
}

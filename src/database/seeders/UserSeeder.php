<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Super Admin
        $sa = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );
        $sa->assignRole('super_admin');

        // Example Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Branch Admin', 'password' => Hash::make('password')]
        );
        $admin->assignRole('admin');

        // Example Distributor
        $dist = User::firstOrCreate(
            ['email' => 'distributor@example.com'],
            ['name' => 'Distributor One', 'password' => Hash::make('password')]
        );
        $dist->assignRole('distributor');
    }
}

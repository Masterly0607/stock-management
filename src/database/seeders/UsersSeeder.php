<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ppBranchId = DB::table('branches')->where('name', 'Phnom Penh HQ')->value('id');

        // Super user (no role yet, roles come in Phase 6)
        User::create([
            'name' => 'Super',
            'email' => 'super@local',
            'password' => Hash::make('password'),
            'branch_id' => null, // super admin later in Phase 6
        ]);

        // Branch admin (example)
        User::create([
            'name' => 'PP Admin',
            'email' => 'pp@local',
            'password' => Hash::make('password'),
            'branch_id' => $ppBranchId,
        ]);
    }
}

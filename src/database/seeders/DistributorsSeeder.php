<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistributorsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Look up branches by slug seeded above
        $ppBranchId = DB::table('branches')->where('slug', 'phnom-penh-hq')->value('id');
        $srBranchId = DB::table('branches')->where('slug', 'siem-reap-branch')->value('id');

        // Fail fast if missing (prevents NULL branch_id)
        if (!$ppBranchId || !$srBranchId) {
            throw new \RuntimeException(
                'DistributorsSeeder: Required branches not found. Seed BranchesSeeder first (slugs: phnom-penh-hq, siem-reap-branch).'
            );
        }

        // Idempotent: upsert by unique key (email)
        DB::table('distributors')->updateOrInsert(
            ['email' => 'kb@example.com'], // unique key
            [
                'branch_id'  => $ppBranchId,
                'name'       => 'Khmer Beauty Shop',
                'phone'      => '011111111',
                'address'    => 'Phnom Penh',
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );

        DB::table('distributors')->updateOrInsert(
            ['email' => 'angkor@example.com'], // unique key
            [
                'branch_id'  => $srBranchId,
                'name'       => 'Angkor Cosmetics',
                'phone'      => '022222222',
                'address'    => 'Siem Reap',
                'updated_at' => $now,
                'created_at' => $now,
            ]
        );
    }
}

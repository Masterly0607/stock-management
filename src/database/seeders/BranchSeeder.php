<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $pp = DB::table('provinces')->where('name', 'Phnom Penh')->first();
        $ppDist = DB::table('districts')->where('province_id', $pp->id)->first();

        $sr = DB::table('provinces')->where('name', 'Siem Reap')->first();
        $srDist = DB::table('districts')->where('province_id', $sr->id)->first();

        DB::table('branches')->insert([
            [
                'name' => 'Phnom Penh HQ',
                'code' => 'PP-HQ',
                'province_id' => $pp->id,
                'district_id' => $ppDist->id,
                'address' => 'Preah Norodom Blvd',
                'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Siem Reap Branch',
                'code' => 'SR-01',
                'province_id' => $sr->id,
                'district_id' => $srDist->id,
                'address' => 'Wat Bo Rd',
                'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}

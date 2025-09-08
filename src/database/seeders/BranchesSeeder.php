<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchesSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // 1) Look up province IDs by name (match your ProvincesSeeder)
        $ppProvinceId = DB::table('provinces')->where('name', 'Phnom Penh')->value('id');
        $srProvinceId = DB::table('provinces')->where('name', 'Siem Reap')->value('id');

        if (!$ppProvinceId || !$srProvinceId) {
            throw new \RuntimeException('BranchesSeeder: Missing provinces. Seed ProvincesSeeder first with Phnom Penh / Siem Reap.');
        }

        // 2) Pick any district in those provinces (or target specific names if you have them)
        $ppDistrictId = DB::table('districts')->where('province_id', $ppProvinceId)->value('id');
        $srDistrictId = DB::table('districts')->where('province_id', $srProvinceId)->value('id');

        if (!$ppDistrictId || !$srDistrictId) {
            throw new \RuntimeException('BranchesSeeder: Missing districts for provinces. Seed DistrictsSeeder properly.');
        }

        // 3) Upsert branches with the required FKs
        DB::table('branches')->updateOrInsert(
            ['slug' => 'phnom-penh-hq'], // unique key
            [
                'name'        => 'Phnom Penh HQ',
                'province_id' => $ppProvinceId,
                'district_id' => $ppDistrictId,
                'address'     => 'Phnom Penh',
                'updated_at'  => $now,
                'created_at'  => $now,
            ]
        );

        DB::table('branches')->updateOrInsert(
            ['slug' => 'siem-reap-branch'],
            [
                'name'        => 'Siem Reap Branch',
                'province_id' => $srProvinceId,
                'district_id' => $srDistrictId,
                'address'     => 'Siem Reap',
                'updated_at'  => $now,
                'created_at'  => $now,
            ]
        );
    }
}

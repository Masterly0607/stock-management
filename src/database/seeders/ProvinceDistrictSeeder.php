<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceDistrictSeeder extends Seeder
{
    public function run(): void
    {
        // Minimal sample for dev; extend as needed
        $ppId = DB::table('provinces')->insertGetId(['name' => 'Phnom Penh', 'code' => 'PP', 'created_at' => now(), 'updated_at' => now()]);
        $srId = DB::table('provinces')->insertGetId(['name' => 'Siem Reap', 'code' => 'SR', 'created_at' => now(), 'updated_at' => now()]);

        DB::table('districts')->insert([
            ['province_id' => $ppId, 'name' => 'Chamkar Mon', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => $ppId, 'name' => 'Toul Kork', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => $srId, 'name' => 'Siem Reap', 'created_at' => now(), 'updated_at' => now()],
            ['province_id' => $srId, 'name' => 'Prasat Bakong', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

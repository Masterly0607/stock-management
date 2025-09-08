<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $now = now();

        // Look up province ids by name so we don't rely on numeric ids.
        $ppId = DB::table('provinces')->where('name', 'Phnom Penh')->value('id');
        $srId = DB::table('provinces')->where('name', 'Siem Reap')->value('id');

        DB::table('districts')->insert([
            // Phnom Penh (examples)
            ['province_id' => $ppId, 'name' => 'Chamkar Mon', 'created_at' => $now, 'updated_at' => $now],
            ['province_id' => $ppId, 'name' => 'Daun Penh',   'created_at' => $now, 'updated_at' => $now],
            ['province_id' => $ppId, 'name' => 'Toul Kork',   'created_at' => $now, 'updated_at' => $now],
            // Siem Reap (examples)
            ['province_id' => $srId, 'name' => 'Sangkat Svay Dangkum', 'created_at' => $now, 'updated_at' => $now],
            ['province_id' => $srId, 'name' => 'Nokor Thum',           'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

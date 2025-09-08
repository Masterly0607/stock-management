<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->upsert([
    ['name' => 'Phnom Penh', 'created_at' => now(), 'updated_at' => now()],
    ['name' => 'Siem Reap',  'created_at' => now(), 'updated_at' => now()],
], ['name'], ['updated_at']);

    }
}

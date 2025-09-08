<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $now = now();

        DB::table('suppliers')->insert([
            ['name' => 'Green Leaf Imports', 'phone' => '033333333', 'email' => 'greenleaf@example.com', 'address' => 'Bangkok',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lotus Trading Co.',  'phone' => '044444444', 'email' => 'lotus@example.com',     'address' => 'Ho Chi Minh','created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

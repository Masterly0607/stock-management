<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $now = now();

        DB::table('categories')->upsert([
            ['name' => 'Skincare',  'slug' => 'skincare',  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Makeup',    'slug' => 'makeup',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fragrance', 'slug' => 'fragrance', 'created_at' => $now, 'updated_at' => $now],
        ], ['slug'], ['updated_at']);
    }
}

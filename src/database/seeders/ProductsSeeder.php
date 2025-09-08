<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $now = now();

        // Get category IDs by slug
        $skincareId  = DB::table('categories')->where('slug', 'skincare')->value('id');
        $makeupId    = DB::table('categories')->where('slug', 'makeup')->value('id');
        $fragranceId = DB::table('categories')->where('slug', 'fragrance')->value('id');

        DB::table('products')->upsert([
            [
                'sku'         => 'SKU-001',
                'name'        => 'Aloe Vera Gel',
                'category_id' => $skincareId,
                'unit'        => 'pcs',
                'price'       => 5.50,
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'sku'         => 'SKU-002',
                'name'        => 'Lip Balm',
                'category_id' => $makeupId,
                'unit'        => 'pcs',
                'price'       => 3.20,
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
            [
                'sku'         => 'SKU-003',
                'name'        => 'Floral Mist',
                'category_id' => $fragranceId,
                'unit'        => 'pcs',
                'price'       => 8.90,
                'is_active'   => true,
                'created_at'  => $now,
                'updated_at'  => $now,
            ],
        ], ['sku'], ['name','category_id','unit','price','is_active','updated_at']);
    }
}

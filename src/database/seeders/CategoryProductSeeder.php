<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            'Skincare', 'Makeup', 'Haircare'
        ];

        $catIds = [];
        foreach ($cats as $c) {
            $catIds[$c] = DB::table('product_categories')->insertGetId([
                'name' => $c,
                'slug' => Str::slug($c),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $products = [
            ['sku' => 'SK-001', 'name' => 'Aloe Vera Gel',   'category' => 'Skincare', 'unit' => 'pcs', 'base_price' => 3.50, 'min_stock' => 10],
            ['sku' => 'MU-001', 'name' => 'Matte Lipstick',  'category' => 'Makeup',   'unit' => 'pcs', 'base_price' => 4.20, 'min_stock' => 20],
            ['sku' => 'HC-001', 'name' => 'Shampoo 300ml',   'category' => 'Haircare', 'unit' => 'bottle', 'base_price' => 2.80, 'min_stock' => 15],
        ];

        foreach ($products as $p) {
            DB::table('products')->insert([
                'sku' => $p['sku'],
                'name' => $p['name'],
                'category_id' => $catIds[$p['category']] ?? null,
                'unit' => $p['unit'],
                'base_price' => $p['base_price'],
                'min_stock' => $p['min_stock'],
                'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}

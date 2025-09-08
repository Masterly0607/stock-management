<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProvincesSeeder::class,
            DistrictsSeeder::class,
            BranchesSeeder::class,
            UsersSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            SuppliersSeeder::class,
            DistributorsSeeder::class,
            DemoFlowsSeeder::class   
      
        ]);
    }
}

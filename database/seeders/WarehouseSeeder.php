<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        Warehouse::insert([
        ['name' => 'Warehouse 1', 'latitude' => 10.8505, 'longitude' => 76.2711],
        ['name' => 'Warehouse 2', 'latitude' => 11.2588, 'longitude' => 75.7804],
    ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;
use Carbon\Carbon;
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::insert([
        [
            'product_id' => 1,
            'warehouse_id' => 1,
            'quantity' => 5,
            'expires_at' => Carbon::now()->addDays(5)
        ],
        [
            'product_id' => 2,
            'warehouse_id' => 1,
            'quantity' => 60,
            'expires_at' => Carbon::now()->addDays(20)
        ]
    ]);
    }
}

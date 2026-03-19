<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stock;

class StockController extends Controller
{
    public function store(Request $request)
    {
        $stock = Stock::updateOrCreate(
            [
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id
            ],
            [
                'quantity' => $request->quantity,
                'expires_at' => $request->expires_at
            ]
        );

        return response()->json($stock);
    }
}
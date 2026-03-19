<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Warehouse;
use Carbon\Carbon;

class WarehouseController extends Controller
{
    public function report($id)
    {
        $warehouse = Warehouse::with('stocks.product')->findOrFail($id);

        $data = $warehouse->stocks->map(function ($stock) {
            return [
                'product' => $stock->product->name,
                'quantity' => $stock->quantity,
                'expires_at' => $stock->expires_at,
                'near_expiry' => $stock->expires_at &&
                    Carbon::parse($stock->expires_at)->diffInDays(now()) <= 7
            ];
        });

        return response()->json([
            'warehouse' => $warehouse->name,
            'report' => $data
        ]);
    }
}

<?php
namespace App\Services;

use Carbon\Carbon;

class DynamicPricingService
{
    public function calculate($product)
    {
        $totalStock = $product->stocks->sum('quantity');
        $price = $product->base_price;

        // Stock-based pricing
        if ($totalStock < 10) {
            $price *= 1.30;
        } elseif ($totalStock >= 10 && $totalStock <= 50) {
            $price *= 1.10;
        } elseif ($totalStock > 100) {
            $price *= 0.80;
        }

        // Expiry discount
        foreach ($product->stocks as $stock) {
            if ($stock->expires_at && Carbon::parse($stock->expires_at)->diffInDays(now()) <= 7) {
                $price *= 0.75;
                break;
            }
        }

        return round($price, 2);
    }
}
?>
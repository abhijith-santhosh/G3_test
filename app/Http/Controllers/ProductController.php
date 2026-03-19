<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Services\DynamicPricingService;

class ProductController extends Controller
{
    public function index(DynamicPricingService $pricingService)
    {
        $products = Product::with('stocks')->get();

        return $products->map(function ($product) use ($pricingService) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'base_price' => $product->base_price,
                'dynamic_price' => $pricingService->calculate($product)
            ];
        });
    }
}

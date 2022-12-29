<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Color\Color as ColorResource;

class ColorPriceController extends Controller
{
    public function index(Product $product)
    {
        $colors = $product->colors;

        return ColorResource::collection($colors);
    }
}

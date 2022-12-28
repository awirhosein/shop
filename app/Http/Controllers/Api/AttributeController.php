<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Attribute\Attribute as AttributeResource;

class AttributeController extends Controller
{
    public function index(Product $product)
    {
        $attributes = $product->attributes;

        return AttributeResource::collection($attributes);
    }
}

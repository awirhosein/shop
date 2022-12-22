<?php

namespace App\Http\Controllers\Api;

use App\Models\{Product, Category};
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\Comment as CommentResource;
use App\Http\Resources\Product\Product as ProductResource;

class ProductController extends Controller
{
    public function index(Category $category)
    {
        $products = $category->products()->published()->get();

        return ProductResource::collection($products);
    }
    
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function comments(Product $product)
    {
        $comments = $product->comments()->approved()->get();

        return CommentResource::collection($comments);
    }
}

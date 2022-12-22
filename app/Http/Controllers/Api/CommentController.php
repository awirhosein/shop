<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\Comment as CommentResource;

class CommentController extends Controller
{
    public function index(Product $product)
    {
        $comments = $product->comments()->approved()->latest()->get();

        return CommentResource::collection($comments);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $product->comments()->create([
            'user_id' => 1,
            'text' => $request->text
        ]);

        return response()->json([
            'message' => __('msg.success.create')
        ]);
    }
}

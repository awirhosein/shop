<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Question\Question as QuestionResource;

class QuestionController extends Controller
{
    public function index(Product $product)
    {
        $questions = $product->questions()->parent()->approved()->latest()->get();

        return QuestionResource::collection($questions);
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'text' => 'required',
            'parent_id' => 'nullable'
        ]);

        auth()->user()->questions()->create($validated + [
            'product_id' => $product->id
        ]);

        return response()->json([
            'message' => __('msg.success.create')
        ]);
    }
}

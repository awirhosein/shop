<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\Category as CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::parents()->get();

        return CategoryResource::collection($categories);
    }
}

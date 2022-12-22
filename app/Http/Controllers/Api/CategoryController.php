<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryParent as CategoryParentResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::parents()->get();

        return CategoryParentResource::collection($categories);
    }
}

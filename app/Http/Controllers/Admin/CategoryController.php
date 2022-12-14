<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::parents()->get();

        return view('admin.pages.categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'slug' => ['required', 'min:3'],
            'parent_id' => ['nullable'],
        ]);

        // TODO: observer
        $validated['slug'] = str()->slug($request->slug);

        Category::create($validated);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.categories.index');
    }

    public function edit(Category $category)
    {
        $parents = Category::parents(except: $category->id)->get();

        return view('admin.pages.categories.edit', compact('category', 'parents'));
    }

    public function update(Category $category, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'slug' => ['required', 'min:3'],
            'parent_id' => ['nullable'],
        ]);

        $validated['slug'] = str()->slug($request->slug);

        $category->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}

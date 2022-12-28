<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(config('custom.per_page'));

        return view('admin.pages.categories.index', compact('categories'), [
            'fields' => ['Name', 'Parent Category']
        ]);
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
            'parent_id' => ['nullable'],
        ]);

        Category::create($validated + ['slug' => str()->slug($request->name)]);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.categories.index');
    }

    public function edit(Category $category)
    {
        $parents = Category::parents(except: $category->id)->get();

        return view('admin.pages.categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'parent_id' => ['nullable'],
        ]);

        $category->update($validated + ['slug' => str()->slug($request->name)]);

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

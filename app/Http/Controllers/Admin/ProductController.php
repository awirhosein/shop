<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\{Product, Category};
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::parents()->get();

        return view('admin.pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'content' => ['nullable'],
            'category_id' => ['nullable'],
            'status' => ['required', Rule::in(Product::STATUS_TYPES)]
        ]);

        // TODO: observer
        $validated['slug'] = str()->slug($request->name);

        Product::create($validated);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::parents()->get();

        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    public function update(Product $product, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'content' => ['nullable'],
            'category_id' => ['nullable'],
            'status' => ['required', Rule::in(Product::STATUS_TYPES)]
        ]);

        $product->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
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
        return view('admin.pages.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ]);

        // TODO: observer
        $validated['slug'] = str()->slug($request->name);

        Product::create($validated);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.products.index');
    }

    public function edit(Product $product)
    {
        return view('admin.pages.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
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

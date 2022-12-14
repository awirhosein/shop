<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Product, Category};
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{StoreRequest, UpdateRequest};

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

    public function store(StoreRequest $request)
    {
        $text = str()->lower($request->name);
        $slug = str()->replace(' ', '-', $text);

        Product::create($request->validated() + ['slug' => $slug]);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::parents()->get();

        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $text = str()->lower($request->name);
        $slug = str()->replace(' ', '-', $text);

        $product->update($request->validated() + ['slug' => $slug]);

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

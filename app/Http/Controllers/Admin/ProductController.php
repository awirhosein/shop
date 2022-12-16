<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
        $categories = Category::whereNotNull('parent_id')->get();

        return view('admin.pages.products.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        Product::create($request->validated() + ['slug' => $this->getSlug($request->name)]);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::whereNotNull('parent_id')->get();

        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated() + ['slug' => $this->getSlug($request->name)]);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }

    protected function getSlug($text): string
    {
        $lowerText = str()->lower($text);
        $slug = str()->replace(' ', '-', $lowerText);

        return $slug;
    }

    public function attribute(Product $product)
    {
        $attributes = $product->category?->parent->attributes;

        return view('admin.pages.products.attribute', compact('product', 'attributes'));
    }

    public function attributeUpdate(Request $request, Product $product)
    {
        if ($request->has('values')) {
            $values = [];
            foreach (array_filter($request->values) as $key => $value) {
                $values[$key] = ['value' => $value];
            }

            $product->attributes()->sync($values);

            toast(__('msg.success.update'), 'success');
        } else {
            toast(__('msg.error.update'), 'error');
        }

        return redirect_back('admin.products.index');
    }
}

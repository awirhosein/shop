<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\{Product, Color, ProductColor};

class ProductColorController extends Controller
{
    public function index(Product $product)
    {
        $colors = $product->colors()->orderByPivot('id', 'desc')->paginate(config('custom.per_page'));

        return view('admin.pages.products.colors.index', compact('product', 'colors'), [
            'fields' => ['Color', 'Price']
        ]);
    }

    public function create(Product $product)
    {
        $colors = Color::get();

        return view('admin.pages.products.colors.create', compact('product', 'colors'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'price' => ['required', 'integer'],
            'color_id' => ['required', Rule::unique(ProductColor::class, 'color_id')->where('product_id', $product->id)],
        ], [], ['color_id' => 'رنگ']);

        $product->colors()->attach($request->color_id, ['price' => $request->price]);

        toast(__('msg.success.create'), 'success');

        return redirect()->route('admin.products.colors.index', $product);
    }

    public function edit(Product $product, ProductColor $color)
    {
        $colors = Color::get();

        return view('admin.pages.products.colors.edit', compact('product', 'colors'), [
            'colorProduct' => $color
        ]);
    }

    public function update(Request $request, Product $product, ProductColor $color)
    {
        $request->validate([
            'price' => ['required', 'integer'],
            'color_id' => ['required', Rule::unique(ProductColor::class, 'color_id')->where('product_id', $product->id)->ignore($color->id)],
        ], [], ['color_id' => 'رنگ']);

        $product->colors()->syncWithPivotValues([$request->color_id], ['price' => $request->price], false);

        if ($color->color_id != $request->color_id) {
            $color->delete();
        }

        toast(__('msg.success.update'), 'success');

        return redirect()->route('admin.products.colors.index', $product);
    }

    public function destroy(Product $product, ProductColor $color)
    {
        $color->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}

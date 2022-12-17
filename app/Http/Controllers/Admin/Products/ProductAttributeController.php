<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
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

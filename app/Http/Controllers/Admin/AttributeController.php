<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Attribute, Category};

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.attributes.index', compact('attributes'), [
            'fields' => ['Name', 'Category']
        ]);
    }

    public function create()
    {
        $categories = Category::parents()->get();

        return view('admin.pages.attributes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'category_id' => ['required'],
        ]);

        Attribute::create($validated);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.attributes.index');
    }

    public function edit(Attribute $attribute)
    {
        $categories = Category::parents()->get();

        return view('admin.pages.attributes.edit', compact('attribute', 'categories'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'category_id' => ['required'],
        ]);

        $attribute->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.attributes.index');
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}

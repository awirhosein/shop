<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::latest()->paginate(config('custom.per_page'));

        return view('admin.pages.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.pages.colors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('colors')],
            'code' => ['required'],
        ]);

        Color::create($validated);

        toast(__('msg.success.create'), 'success');

        return redirect_back('admin.colors.index');
    }

    public function edit(Color $color)
    {
        return view('admin.pages.colors.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', Rule::unique('colors')->ignore($color->id)],
            'code' => ['required'],
        ]);

        $color->update($validated);

        toast(__('msg.success.update'), 'success');

        return redirect_back('admin.colors.index');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        toast(__('msg.success.delete'), 'success');

        return redirect()->back();
    }
}

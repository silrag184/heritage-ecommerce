<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colors;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ColorsController extends Controller
{
    public function colorView()
    {
        $colors = Colors::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.color.index', compact('colors'));
    }

    public function colorAdd()
    {
        return view('admin-panel.pages.settings-module.color.add');
    }

    public function colorStore(Request $request)
    {
        $request->validate([
            'color_name' => 'required|string|max:255|unique:colors,color_name',
            'color_code' => 'required|string|max:30|unique:colors,color_code',
            'slug' => 'nullable|string|max:255|unique:colors,slug',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['color_name']);
        }

        Colors::create($data);

        return redirect()->route('color.view')->with('success', 'Color created successfully.');
    }

    public function colorEdit($id)
    {
        $color = Colors::findOrFail($id);
        return view('admin-panel.pages.settings-module.color.edit', compact('color'));
    }

    public function colorUpdate(Request $request, $id)
    {
        $color = Colors::findOrFail($id);

        $request->validate([
            'color_name' => ['required', 'string', 'max:255', Rule::unique('colors', 'color_name')->ignore($id)],
            'color_code' => ['required', 'string', 'max:30', Rule::unique('colors', 'color_code')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('colors', 'slug')->ignore($id)],
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['color_name']);
        }

        $color->update($data);

        return redirect()->route('color.view')->with('success', 'Color updated successfully.');
    }

    public function colorDelete($id)
    {
        $color = Colors::findOrFail($id);
        $color->delete();

        return redirect()->route('color.view')->with('success', 'Color deleted successfully.');
    }
}

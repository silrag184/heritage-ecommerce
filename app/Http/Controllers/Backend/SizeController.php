<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SizeController extends Controller
{
    public function sizeView()
    {
        $sizes = Size::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.size.index', compact('sizes'));
    }

    public function sizeAdd()
    {
        return view('admin-panel.pages.settings-module.size.add');
    }

    public function sizeStore(Request $request)
    {
        $request->validate([
            'size_name' => 'required|string|max:255|unique:sizes,size_name',
            'size_code' => 'required|string|max:10|unique:sizes,size_code',
            'slug' => 'nullable|string|max:255|unique:sizes,slug',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['size_name']);
        }

        Size::create($data);

        return redirect()->route('size.view')->with('success', 'Size created successfully.');
    }

    public function sizeEdit($id)
    {
        $size = Size::findOrFail($id);
        return view('admin-panel.pages.settings-module.size.edit', compact('size'));
    }

    public function sizeUpdate(Request $request, $id)
    {
        $size = Size::findOrFail($id);

        $request->validate([
            'size_name' => ['required', 'string', 'max:255', Rule::unique('sizes', 'size_name')->ignore($id)],
            'size_code' => ['required', 'string', 'max:10', Rule::unique('sizes', 'size_code')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('sizes', 'slug')->ignore($id)],
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['size_name']);
        }

        $size->update($data);

        return redirect()->route('size.view')->with('success', 'Size updated successfully.');
    }

    public function sizeDelete($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        
        return redirect()->route('size.view')->with('success', 'Size deleted successfully.');
    }
}

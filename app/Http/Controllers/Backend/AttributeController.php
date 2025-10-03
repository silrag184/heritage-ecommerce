<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = Attribute::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.settings-module.attribute.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'attribute_name' => 'required|string|max:255|unique:attributes,attribute_name',
            'slug' => 'nullable|string|max:255|unique:attributes,slug',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['attribute_name']);
        }

        Attribute::create($data);

        $notification = array(
            'message' => 'Attribute created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('attributes.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin-panel.pages.settings-module.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attribute = Attribute::findOrFail($id);

        $request->validate([
            'attribute_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('attributes', 'attribute_name')->ignore($id),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('attributes', 'slug')->ignore($id),
            ],
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['attribute_name']);
        }

        $attribute->update($data);

        $notification = array(
            'message' => 'Attribute updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('attributes.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        $notification = array(
            'message' => 'Attribute deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('attributes.index')->with($notification);
    }
}

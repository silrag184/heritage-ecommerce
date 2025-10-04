<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributeValues = AttributeValue::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.attribute.attribute-value.index', compact('attributeValues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attributes = Attribute::all();
        return view('admin-panel.pages.settings-module.attribute.attribute-value.add', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255|unique:attribute_values,value',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        AttributeValue::create($data);

        $notification = array(
            'message' => 'Value Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('attribute-values.index')->with($notification);
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
        $attributeValue = AttributeValue::findOrFail($id);
        $attributes = Attribute::all();
        return view('admin-panel.pages.settings-module.attribute.attribute-value.edit', compact('attributeValue', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attributeValue = AttributeValue::findOrFail($id);

        $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255|unique:attribute_values,value,' . $id,
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        $attributeValue->update($data);

        $notification = array(
            'message' => 'Value Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('attribute-values.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

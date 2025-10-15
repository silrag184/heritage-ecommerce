<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ShippingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippingAreas = ShippingArea::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.shipping-area.index', compact('shippingAreas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.settings-module.shipping-area.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_name' => 'required|string|max:255|unique:shipping_areas,area_name',
            'region' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'shipping_cost' => 'nullable|numeric|min:0',
            'delivery_time' => 'nullable|integer|min:1',
            'status' => 'nullable|in:0,1',
        ]);

        ShippingArea::create($request->all());

        $notification = array(
            'message' => 'Shipping Area created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shippingAreas.index')->with($notification);
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
        $shippingArea = ShippingArea::findOrFail($id);
        return view('admin-panel.pages.settings-module.shipping-area.edit', compact('shippingArea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'area_name' => ['required', 'string', 'max:255', Rule::unique('shipping_areas', 'area_name')->ignore($id)],
            'region' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'shipping_cost' => 'nullable|numeric|min:0',
            'delivery_time' => 'nullable|integer|min:1',
            'status' => 'nullable|in:0,1',
        ]);

        $shippingArea = ShippingArea::findOrFail($id);
        $shippingArea->update($request->all());

        $notification = array(
            'message' => 'Shipping Area updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shippingAreas.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shippingArea = ShippingArea::findOrFail($id);
        $shippingArea->delete();

        $notification = array(
            'message' => 'Shipping Area deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('shippingAreas.index')->with($notification);
    }
}

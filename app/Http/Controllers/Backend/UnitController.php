<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.settings-module.unit.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|string|max:255|unique:units,unit_name',
            'unit_code' => 'required|string|max:10|unique:units,unit_code',
            'slug' => 'nullable|string|max:255|unique:units,slug',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['unit_name']);
        }

        Unit::create($data);

        $notification = array(
            'message' => 'Unit created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('units.index')->with($notification);
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
        $unit = Unit::findOrFail($id);
        return view('admin-panel.pages.settings-module.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::findOrFail($id);

        $request->validate([
            'unit_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('units', 'unit_name')->ignore($id),
            ],
            'unit_code' => [
                'required',
                'string',
                'max:10',
                Rule::unique('units', 'unit_code')->ignore($id),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('units', 'slug')->ignore($id),
            ],
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['unit_name']);
        }

        $unit->update($data);

        $notification = array(
            'message' => 'Unit updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('units.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        $notification = array(
            'message' => 'Unit deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('units.index')->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin-panel.pages.settings-module.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.settings-module.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255|unique:brands,brand_name',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:1024',
            'slug' => 'nullable|string|max:255|unique:brands,slug',
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['brand_name']);
        }

        //make this safe for filename
        $brandNameSlug = Str::slug($request->brand_name, '_');

        // Handle brand logo upload
        if ($request->hasFile('brand_logo')) {
            $file = $request->file('brand_logo');
            // $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $filename = $brandNameSlug . '_' . time() . '.' . $request->brand_logo->extension();
            $filePath = 'uploads/images/brands/' . $filename;
            $file->move(public_path('uploads/images/brands'), $filename);
            $data['brand_logo'] = $filePath;
        }

        Brand::create($data);

        $notification = [
            'message' => 'Brand Created Successfullt',
            'alert-type' => 'success'
        ];

        return redirect()->route('brands.index')->with($notification);
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
        $brand = Brand::findOrFail($id);
        return view('admin-panel.pages.settings-module.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'brand_name' => ['required', 'string', 'max:255', Rule::unique('brands')->ignore($id)],
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:1024',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('brands')->ignore($id)],
            'description' => 'nullable|string',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['brand_name']);
        }

        //make this safe for filename
        $brandNameSlug = Str::slug($request->brand_name, '_');

        // Handle brand logo upload
        if ($request->hasFile('brand_logo')) {
            // Delete old logo if exists
            if ($brand->brand_logo && file_exists(public_path($brand->brand_logo))) {
                unlink(public_path($brand->brand_logo));
            }
            $file = $request->file('brand_logo');
            // $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $filename = $brandNameSlug . '_' . time() . '.' . $request->brand_logo->extension();
            $filePath = 'uploads/images/brands/' . $filename;
            $file->move(public_path('uploads/images/brands'), $filename);
            $data['brand_logo'] = $filePath;
        }

        $brand->update($data);

        $notification = [
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('brands.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->brand_logo && file_exists(public_path($brand->brand_logo))) {
            unlink(public_path($brand->brand_logo));
        }
        $brand->delete();
        $notification = [
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('brands.index')->with($notification);
    }
}

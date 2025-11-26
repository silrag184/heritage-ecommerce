<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ComboPackage;
use App\Models\ComboProductPackage;
use App\Models\Product;
use Illuminate\Support\Str;

class ComboPackages extends Controller
{
    public function index()
    {
        $packages = ComboPackage::all();
        return view("admin-panel.pages.package.index", compact("packages"));
    }

    public function checkSlug(Request $request)
    {
        $exists = ComboPackage::where('slug', $request->slug)->exists();

        return response()->json(['exists' => $exists]);
    }



    public function create()
    {
        $products = Product::where('status', 1)->get();
        return view("admin-panel.pages.package.create", compact("products"));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'status' => 'required|string',
            'product_ids' => 'required|array',            // array of product IDs
            'product_ids.*' => 'integer',                // each must be an ID
        ]);

        // Create slug automatically
        $slug = Str::slug($request->name);

        // Save Combo
        $combo = new ComboPackage();
        $combo->name = $request->name;
        $combo->slug = $slug;
        $combo->url = $request->url;
        $combo->meta_title = $request->meta_title;
        $combo->meta_description = $request->meta_description;
        $combo->meta_keywords = $request->meta_keywords;
        $combo->status = $request->status;
        $combo->save();

        // multiple products
        foreach ($request->product_ids as $productId) {
            ComboProductPackage::create([
                'combo_package_id' => $combo->id,
                'product_id' => $productId
            ]);
        }

        return redirect()->back()->with([
            'message' => 'Combo Package Created Successfully',
            'alert-type' => 'success'
        ]);
    }

    // Edit Combo
    public function edit($id)
    {
        $package = ComboPackage::with('products')->findOrFail($id);
        $products = Product::all();
        return view('admin-panel.pages.package.edit', compact('package', 'products'));
    }

    public function update(Request $request, $id)
    {
        $package = ComboPackage::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:combo_packages,slug,' . $id,
            'url'  => 'required|unique:combo_packages,url,' . $id,
            'status' => 'required',
            'product_id' => 'required|array|min:1',
        ]);

        $package->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'url'  => $request->url,
            'status'=> $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        // update product attach
        $package->products()->sync($request->product_id);

        return redirect()->route('combo-packages.list')->with('success', 'Combo Package Updated Successfully!');
    }

   public function destroy($id)
    {
        $package = ComboPackage::findOrFail($id);
        ComboProductPackage::where('combo_package_id', $package->id)->delete();
        $package->delete();
        // Return with success message
        return redirect()->route('combo-packages.list')->with([
            'message' => 'Combo package deleted successfully!',
            'alert-type' => 'success'
        ]);
    }



    // Show
    public function show($id)
    {
        $package = ComboPackage::with('products')->findOrFail($id);
        return view('admin-panel.pages.package.show', compact('package'));
    }

}

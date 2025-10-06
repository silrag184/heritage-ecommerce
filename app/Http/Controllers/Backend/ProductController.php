<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function productView()
    {
        // Fetch all products from the database
        //to see index.blade.php
        $products = Product::all();
        return view('admin-panel.pages.product.index', compact('products'));
    }

    public function productAdd()
    {
        return view('admin-panel.pages.product.add');
    }

    public function productStore(Request $request)
    {
        // Validate the incoming request data
    }

    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin-panel.pages.product.edit', compact('product'));
    }

    public function productUpdate(Request $request, $id)
    {
        // Validate and update the product
    }

    public function productDelete($id)
    {
        // Delete the product
    }
}

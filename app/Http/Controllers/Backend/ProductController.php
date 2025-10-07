<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductColorImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();

        return view('admin-panel.pages.product.add', compact('categories', 'subCategories'));
    }

    public function productStore(Request $request)
    {


        dd($request->all());
        // ✅ Step 1: Validate incoming data
        $validated = $request->validate([
            'product_name'     => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255',
            'category_id'      => 'required|integer|exists:categories,id',
            'subCategory_id'   => 'nullable|integer|exists:sub_categories,id',
            'description'      => 'nullable|string',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags'             => 'nullable|string|max:255',
            'status'           => 'required|boolean',
            'is_featured'      => 'required|boolean',
            'colors'           => 'nullable|array',
            'colors.*'         => 'nullable|string',
            'color_images'     => 'nullable|array',
            'color_images.*'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // ✅ Step 2: Use a transaction for safety
        DB::beginTransaction();

        try {
            // ✅ Step 3: Create Product
            $product = Product::create([
                'product_name'     => $validated['product_name'],
                'slug'             => $validated['slug'] ?? Str::slug($validated['product_name']),
                'category_id'      => $validated['category_id'],
                'subCategory_id'   => $validated['subCategory_id'] ?? null,
                'description'      => $validated['description'] ?? null,
                'meta_title'       => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
                'tags'             => $validated['tags'] ?? null,
                'status'           => $validated['status'],
                'is_featured'      => $validated['is_featured'],
            ]);

            // ✅ Step 4: Handle Color & Image Uploads
            if (!empty($validated['colors']) && $request->hasFile('color_images')) {
                foreach ($validated['colors'] as $index => $colorCode) {
                    $colorImage = $request->file('color_images')[$index] ?? null;

                    if ($colorImage) {
                        $fileName = time() . '-' . uniqid() . '.' . $colorImage->getClientOriginalExtension();
                        $colorImage->move(public_path('uploads/products/colors'), $fileName);
                        ProductColorImage::create([
                            'product_id' => $product->id,
                            'color_code' => $colorCode,
                            'image_path' => 'uploads/products/colors/' . $fileName,
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Product created successfully.',
                'product' => $product->load('colorImages'),
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => 'Failed to create product.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function productEdit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin-panel.pages.product.edit', compact('product'));
    }

    public function productUpdate(Request $request, $id)
    {
        // ✅ Step 1: Validate request data
        $validated = $request->validate([
            'product_name'     => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255',
            'category_id'      => 'required|integer|exists:categories,id',
            'subCategory_id'   => 'nullable|integer|exists:sub_categories,id',
            'description'      => 'nullable|string',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags'             => 'nullable|string|max:255',
            'status'           => 'required|boolean',
            'is_featured'      => 'required|boolean',
            'colors'           => 'nullable|array',
            'colors.*'         => 'nullable|string',
            'color_images'     => 'nullable|array',
            'color_images.*'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'existing_color_ids' => 'nullable|array', // optional hidden inputs for existing colors
            'remove_color_ids'   => 'nullable|array', // optional: IDs of color images to delete
        ]);

        DB::beginTransaction();

        try {
            // ✅ Step 2: Find product
            $product = Product::findOrFail($id);

            // ✅ Step 3: Update product main fields
            $product->update([
                'product_name'     => $validated['product_name'],
                'slug'             => $validated['slug'] ?? Str::slug($validated['product_name']),
                'category_id'      => $validated['category_id'],
                'subCategory_id'   => $validated['subCategory_id'] ?? null,
                'description'      => $validated['description'] ?? null,
                'meta_title'       => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
                'tags'             => $validated['tags'] ?? null,
                'status'           => $validated['status'],
                'is_featured'      => $validated['is_featured'],
            ]);

            // ✅ Step 4: Remove selected color-images if any
            if (!empty($validated['remove_color_ids'])) {
                $colorImagesToRemove = ProductColorImage::whereIn('id', $validated['remove_color_ids'])->get();
                foreach ($colorImagesToRemove as $img) {
                    if (file_exists(public_path($img->image_path))) {
                        unlink(public_path($img->image_path));
                    }
                    $img->delete();
                }
            }

            // ✅ Step 5: Handle existing color updates
            if (!empty($validated['existing_color_ids'])) {
                foreach ($validated['existing_color_ids'] as $index => $colorId) {
                    $colorImageModel = ProductColorImage::find($colorId);
                    if ($colorImageModel) {
                        $colorImageModel->color_code = $validated['colors'][$index] ?? $colorImageModel->color_code;

                        // If a new file uploaded for this color
                        if (isset($request->file('color_images')[$index])) {
                            // Delete old file if exists
                            if (file_exists(public_path($colorImageModel->image_path))) {
                                unlink(public_path($colorImageModel->image_path));
                            }

                            $newFile = $request->file('color_images')[$index];
                            $fileName = time() . '-' . uniqid() . '.' . $newFile->getClientOriginalExtension();
                            $newFile->move(public_path('uploads/products/colors'), $fileName);

                            $colorImageModel->image_path = 'uploads/products/colors/' . $fileName;
                        }

                        $colorImageModel->save();
                    }
                }
            }

            // ✅ Step 6: Add any new colors/images (not existing)
            if ($request->has('new_colors') && $request->hasFile('new_color_images')) {
                foreach ($request->new_colors as $index => $newColor) {
                    $newImage = $request->file('new_color_images')[$index] ?? null;

                    if ($newImage) {
                        $fileName = time() . '-' . uniqid() . '.' . $newImage->getClientOriginalExtension();
                        $newImage->move(public_path('uploads/products/colors'), $fileName);

                        ProductColorImage::create([
                            'product_id' => $product->id,
                            'color_code' => $newColor,
                            'image_path' => 'uploads/products/colors/' . $fileName,
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status'  => true,
                'message' => 'Product updated successfully.',
                'product' => $product->load('colorImages'),
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status'  => false,
                'message' => 'Failed to update product.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }


    public function productDelete($id)
    {
        // Delete the product
    }
}

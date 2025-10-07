<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductColorImage;
use App\Models\ProductSizes;
use App\Models\ProductTags;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Unit;
use App\Models\Size;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
        $categories = Category::where('status',1)->get();
        $subCategories = SubCategory::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $units = Unit::where('status',1)->get();
        $tags = Tag::where('status',1)->get();
        $sizes = Size::where('status',1)->get();
        $attributeValues = AttributeValue::where('status',1)->get();

        return view('admin-panel.pages.product.add', compact('categories', 'subCategories','brands','units','tags', 'sizes', 'attributeValues'));
    }

    public function productStore(Request $request)
    {
        // dd($request->all());
        try {
        // ✅ Step 1: Validate all inputs
        $validated = $request->validate([
            'product_name'        => 'required|string|max:255',
            'slug'                => 'nullable|string|max:255|unique:products,slug',
            'sku'                 => 'nullable|string|max:255|unique:products,sku',
            'category_id'         => 'required|exists:categories,id',
            'sub_category_id'     => 'required|exists:sub_categories,id',
            'brand_id'            => 'required|exists:brands,id',
            'size_id'             => 'nullable|array', //
            'size_id.*'           => 'exists:sizes,id', //
            'tag_id'              => 'nullable|array', //
            'tag_id.*'            => 'exists:tags,id', //
            'attribute_value_id'  => 'required|exists:attributes,id',
            'short_description'   => 'nullable|string',
            'long_description'    => 'nullable|string',
            'colors'              => 'nullable|array', //
            'colors.*'            => 'nullable|string', //
            'color_images'        => 'nullable|array', //
            'color_images.*'      => 'image|mimes:jpg,jpeg,png,webp,avif|max:1048', //
            'stocks'              => 'required|numeric|min:0',
            'unit_id'             => 'required|exists:units,id',
            't_unit_price'        => 'required|numeric|min:0',
            'purchase_price'      => 'nullable|numeric|min:0',
            'regular_price'       => 'required|numeric|min:0',
            'discount_type'       => 'nullable|in:flat,percentage',
            'discount_amount'     => 'nullable|numeric|min:0',
            'tax'                 => 'required|numeric|min:0',
            'selling_price'       => 'nullable|numeric|min:0',
            'meta_title'          => 'nullable|string|max:255',
            'meta_keys'           => 'nullable|string',
            'meta_description'    => 'nullable|string',
            'status'              => 'required|boolean',
            'is_featured'         => 'nullable|boolean',
        ]);

        // ✅ Step 3: Create Product
        $product = Product::create([
            'product_name'       => $validated['product_name'],
            'slug'               => $validated['slug'],
            'category_id'        => $validated['category_id'],
            'sub_category_id'    => $validated['sub_category_id'],
            'brand_id'           => $validated['brand_id'],
            'attribute_value_id' => $validated['attribute_value_id'],
            'short_description'  => $validated['short_description'] ?? null,
            'long_description'   => $validated['long_description'] ?? null,
            'stocks'             => $validated['stocks'],
            'unit_id'            => $validated['unit_id'],
            't_unit_price'       => $validated['t_unit_price'],
            'purchase_price'     => $validated['purchase_price'] ?? 0,
            'regular_price'      => $validated['regular_price'],
            'discount_type'      => $validated['discount_type'] ?? null,
            'discount_amount'    => $validated['discount_amount'] ?? 0,
            'tax'                => $validated['tax'],
            'selling_price'      => $validated['selling_price'] ?? 0,
            'meta_title'         => $validated['meta_title'] ?? null,
            'meta_keys'          => $validated['meta_keys'] ?? null,
            'meta_description'   => $validated['meta_description'] ?? null,
            'status'             => $validated['status'],
            'is_featured'        => $request->has('is_featured') ? 1 : 0,
        ]);

        // ✅ Step 4: Handle Tags
        if (!empty($validated['tag_id'])) {
            foreach ($validated['tag_id'] as $tagId) {
                ProductTags::create([
                    'product_id' => $product->id,
                    'tag_id'     => $tagId,
                ]);
            }
        }

        // ✅ Step 5: Handle Sizes
        if (!empty($validated['size_id'])) {
            foreach ($validated['size_id'] as $sizeId) {
                ProductSizes::create([
                    'product_id' => $product->id,
                    'size_id'    => $sizeId,
                ]);
            }
        }

        // ✅ Step 6: Handle Color & Image Uploads
        if (!empty($validated['colors']) && $request->hasFile('color_images')) {
            foreach ($validated['colors'] as $index => $colorCode) {
                $colorImage = $request->file('color_images')[$index] ?? null;
                if ($colorImage) {
                    $fileName = time() . '-' . uniqid() . '.' . $colorImage->getClientOriginalExtension();
                    $colorImage->move(public_path('uploads/images/products/colors'), $fileName);
                    ProductColorImage::create([
                        'product_id' => $product->id,
                        'color_code' => $colorCode,
                        'image_path' => 'uploads/images/products/colors/' . $fileName,
                    ]);
                }
            }
        }

        // ✅ Step 7: Redirect with success message
        return redirect()->route('product.view')->with('success', 'Product added successfully!');
    } catch (ValidationException  $e) {
        // ✅ Handle unexpected errors
        return back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
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
                            $newFile->move(public_path('uploads/images/products/colors'), $fileName);

                            $colorImageModel->image_path = 'uploads/images/products/colors/' . $fileName;
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
                        $newImage->move(public_path('uploads/images/products/colors'), $fileName);

                        ProductColorImage::create([
                            'product_id' => $product->id,
                            'color_code' => $newColor,
                            'image_path' => 'uploads/images/products/colors/' . $fileName,
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

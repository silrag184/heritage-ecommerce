<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function subCategoryView()
    {
        $subCategory = SubCategory::latest()->paginate(10);
        return view('admin-panel.pages.category.sub-category.index', compact('subCategory'));
    }

    public function subCategoryAdd()
    {
        $categories = Category::all();
        return view('admin-panel.pages.category.sub-category.add', compact('categories'));
    }

    public function subCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255|unique:sub_categories,title',
            'slug' => 'nullable|string|max:255|unique:sub_categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $titleSlug = Str::slug($request->title, '_');
            $imageName = $titleSlug . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/images/sub_categories'), $imageName);
            $data['image'] = 'uploads/images/sub_categories/' . $imageName;
        }

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        SubCategory::create($data);

        $notification = [
            'message' => 'Sub Category Created Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('subCategory.view')->with($notification);
    }

    public function subCategoryEdit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin-panel.pages.category.sub-category.edit', compact('subCategory', 'categories'));
    }

    public function subCategoryUpdate(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => ['required', 'string', 'max:255', Rule::unique('sub_categories')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('sub_categories')->ignore($id)],
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($subCategory->image && file_exists(public_path($subCategory->image))) {
                unlink(public_path($subCategory->image));
            }

            $titleSlug = Str::slug($request->title, '_');
            $imageName = $titleSlug . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/images/sub_categories'), $imageName);
            $data['image'] = 'uploads/images/sub_categories/' . $imageName;
        }

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $subCategory->update($data);

        $notification = [
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('subCategory.view')->with($notification);
    }

    public function subCategoryDelete($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        if ($subCategory->image && file_exists(public_path($subCategory->image))) {
            unlink(public_path($subCategory->image));
        }

        $subCategory->delete();

        $notification = [
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('subCategory.view')->with($notification);
    }
}

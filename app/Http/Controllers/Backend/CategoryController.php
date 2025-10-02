<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin-panel.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        return view('admin-panel.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:categories,title',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Handle image upload
        if ($request->hasfile('image')) {
            // make title safe for filename
            $titleSlug = Str::slug($request->title, '_');

            $imageName =$titleSlug . '_' . time() . '_' . $request->image->extension();
            $request->image->move(public_path('uploads/images/categories'), $imageName);
            $data['image'] = 'uploads/images/categories/' . $imageName;
        }

        //Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        Category::create($data);

        $notification = [
            'message' => 'Category Created Successfullt',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.view')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin-panel.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($id)],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('categories')->ignore($id)],
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            'status' => 'nullable|in:0,1',
        ]);

        $data = $request->all();

        //Handle image upload
        if ($request->hasFile('image')) {
            //Delete old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            // make title safe for filename
            $titleSlug = Str::slug($request->title, '_');

            $imageName = $titleSlug . '_' . time() . '_' . $request->image->extention();
            $request->image->move(public_path('uploads/images/categories'), $imageName);
            $data['image'] = 'uploads/images/categories/' . $imageName;
        }

         // Generate slug if not provided
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $category->update($data);

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('category.view')->with($notification);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function delete($id)
    {
        $category = Category::findOrFail($id);

        //Delete image if exists
        if ($category->image && file_exists(public_path($category->image))){
            unlink(public_path($category->image));
        }

        $category->delete();

        $notification = [
            'message' => "Category Deleted Successfully",
            'alert-type' => 'success'
        ];
        return redirect()->route('category.view')->with($notification);
    }
}

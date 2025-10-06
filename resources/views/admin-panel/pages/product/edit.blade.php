@extends('admin-panel.layout.app')

@section('title','Edit Product')

@section('admin-content')

<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Product - {{ $product->product_name }}</h5>
            <a href="{{ route('products.index') }}" class="btn btn-light btn-sm">Back</a>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">

                {{-- Product Info --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $product->slug) }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Sub Category</label>
                        <select name="subCategory_id" class="form-control">
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $sub)
                                <option value="{{ $sub->id }}" {{ $product->subCategory_id == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- Meta Section --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $product->meta_title) }}">
                    </div>
                    <div class="col-md-6">
                        <label>Tags</label>
                        <input type="text" name="tags" class="form-control" value="{{ old('tags', $product->tags) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Featured Product</label>
                        <select name="is_featured" class="form-control">
                            <option value="1" {{ $product->is_featured ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$product->is_featured ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <hr>

                {{-- Existing Colors & Images --}}
                <h5 class="mt-4 mb-2">Product Colors & Images</h5>
                <div id="existingColorsContainer">
                    @foreach($product->colorImages as $index => $color)
                        <div class="row align-items-center mb-3 existing-color-row border p-2 rounded">
                            <input type="hidden" name="existing_color_ids[]" value="{{ $color->id }}">

                            <div class="col-md-4">
                                <label>Color</label>
                                <input type="color" name="colors[]" class="form-control form-control-color" value="{{ $color->color_code }}">
                            </div>

                            <div class="col-md-4">
                                <label>Image (Change optional)</label>
                                <input type="file" name="color_images[]" class="form-control">
                                <div class="mt-2">
                                    <img src="{{ asset($color->image_path) }}" alt="Color Image" width="60" height="60" class="rounded border">
                                </div>
                            </div>

                            <div class="col-md-2 text-center">
                                <label>Remove</label><br>
                                <input type="checkbox" name="remove_color_ids[]" value="{{ $color->id }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>

                {{-- Add New Colors --}}
                <h6>Add New Colors</h6>
                <div id="newColorsContainer"></div>

                <button type="button" id="addMoreColor" class="btn btn-sm btn-outline-primary mt-2">
                    + Add More
                </button>

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-success px-4">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let colorIndex = 0;

    document.getElementById('addMoreColor').addEventListener('click', function () {
        const container = document.getElementById('newColorsContainer');

        const newRow = document.createElement('div');
        newRow.classList.add('row', 'align-items-center', 'mb-3', 'border', 'p-2', 'rounded');
        newRow.innerHTML = `
            <div class="col-md-4">
                <label>Color</label>
                <input type="color" name="new_colors[]" class="form-control form-control-color">
            </div>
            <div class="col-md-4">
                <label>Image</label>
                <input type="file" name="new_color_images[]" class="form-control">
            </div>
            <div class="col-md-2 mt-4">
                <button type="button" class="btn btn-danger btn-sm removeRow">Remove</button>
            </div>
        `;

        container.appendChild(newRow);
    });

    // Remove dynamically added rows
    document.getElementById('newColorsContainer').addEventListener('click', function (e) {
        if (e.target.classList.contains('removeRow')) {
            e.target.closest('.row').remove();
        }
    });
});
</script>
@endsection

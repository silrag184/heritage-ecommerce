@extends('admin-panel.layout.app')

@section('title', 'Edit Product')

@section('admin-content')

    <div class="container-fluid py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Product - {{ $product->product_name }}</h5>
                <a href="{{ route('product.view') }}" class="btn btn-light btn-sm">Back</a>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Product Details</h3>
                        </div>

                        <div class="card-body p-0 create-project-main">
                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Product Basic Info --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="productName" class="form-label text-muted">Product Name: <span
                                                    class="text-danger">*</span></label>
                                            <input id="productName" type="text"
                                                class="form-control text-dark @error('product_name') is-invalid @enderror"
                                                name="product_name"
                                                value="{{ old('product_name', $product->product_name) }}" required>
                                            @error('product_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <label for="slug" class="form-label text-muted">Slug:</label>
                                        <input type="text" id="slug" name="slug"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            value="{{ old('slug', $product->slug) }}">
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <label for="sku" class="form-label text-muted">SKU:</label>
                                        <input type="text" id="sku" name="sku"
                                            class="form-control @error('sku') is-invalid @enderror"
                                            value="{{ old('sku', $product->sku) }}">
                                        @error('sku')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Category / SubCategory / Brand --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <label class="form-label text-muted">Product Category <span
                                                class="text-danger">*</span></label>
                                        <select id="category_id"
                                            class="form-control select2 @error('category_id') is-invalid @enderror"
                                            name="category_id" onchange="subCategoryDropdown(this.value)" required>
                                            <option disabled>---</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <label class="form-label text-muted">SubCategory <span
                                                class="text-danger">*</span></label>
                                        <select id="sub_category_id"
                                            class="form-control select2 @error('sub_category_id') is-invalid @enderror"
                                            name="sub_category_id" required>
                                            <option disabled>---</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}"
                                                    {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                                    {{ $subCategory->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sub_category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <label class="form-label text-muted">Brand <span
                                                class="text-danger">*</span></label>
                                        <select name="brand_id" id="brand_id"
                                            class="form-control select2 @error('brand_id') is-invalid @enderror" required>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->brand_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Size / Tags / Attributes --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-md-4">
                                        <label class="form-label text-muted">Size</label>
                                        <select name="size_id[]" id="size_id" class="form-control select2" multiple
                                            required>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}"
                                                    {{ in_array($size->id, old('size_id', $product->productSizes->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                                    {{ $size->size_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-muted">Tags</label>
                                        <select name="tag_id[]" id="tag_id" class="form-control select2" multiple
                                            required>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                                                    {{ in_array($tag->id, old('tag_id', $product->tags->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                                    {{ $tag->tag_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-muted">Attribute</label>
                                        <select name="attribute_value_id" id="attributes" class="form-control select2"
                                            required>
                                            @foreach ($attributeValues as $attributeValue)
                                                <option value="{{ $attributeValue->id }}"
                                                    {{ old('attribute_value_id', $product->attribute_value_id) == $attributeValue->id ? 'selected' : '' }}>
                                                    {{ $attributeValue->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Short Description</label>
                                        <textarea name="short_description" class="summernote form-control">{{ old('short_description', $product->short_description) }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Long Description</label>
                                        <textarea name="long_description" class="summernote form-control">{{ old('long_description', $product->long_description) }}</textarea>
                                    </div>
                                </div>

                                {{-- Colors and Images --}}
                                <div class="row p-5 border-bottom">
                                    <label class="form-label text-muted">Product Colors with Images</label>
                                    <div id="colorImageContainer">
                                        @forelse ($product->colorImages as $index => $colorImage)
                                            <div class="row align-items-center mb-2 color-image-row">
                                                <div class="col-md-4">
                                                    <label>Color</label>
                                                    <input type="color" name="colors[]"
                                                        value="{{ $colorImage->color }}"
                                                        class="form-control form-control-color">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Image</label>
                                                    <input type="file" name="color_images[]"
                                                        class="form-control dropify"
                                                        data-default-file="{{ asset('uploads/products/' . $colorImage->image) }}">
                                                </div>
                                                <div class="col-md-2 mt-4">
                                                    <button type="button" class="btn btn-danger w-100 remove-row"><i
                                                            class="fe fe-trash-2"></i> Remove</button>
                                                </div>
                                                @if ($loop->first)
                                                    <div class="col-md-2 mt-4">
                                                        <button type="button"
                                                            class="btn btn-success w-100 add-more-row"><i
                                                                class="fe fe-plus"></i> Add More</button>
                                                    </div>
                                                @endif
                                            </div>
                                        @empty
                                            <div class="row align-items-center mb-2 color-image-row">
                                                <div class="col-md-4"><input type="color" name="colors[]"
                                                        value="#000000" class="form-control form-control-color"></div>
                                                <div class="col-md-4"><input type="file" name="color_images[]"
                                                        class="form-control dropify"></div>
                                                <div class="col-md-2 mt-4"><button type="button"
                                                        class="btn btn-danger w-100 remove-row">Remove</button></div>
                                                <div class="col-md-2 mt-4"><button type="button"
                                                        class="btn btn-success w-100 add-more-row">Add More</button></div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                                {{-- Price & Stock --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-md-4">
                                        <label>Stocks</label>
                                        <input type="number" id="stocks" name="stocks"
                                            value="{{ old('stocks', $product->stocks) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Total Unit Price</label>
                                        <input type="number" id="t_unit_price" name="t_unit_price"
                                            value="{{ old('t_unit_price', $product->t_unit_price) }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Regular Price</label>
                                        <input type="number" id="regular_price" name="regular_price"
                                            value="{{ old('regular_price', $product->regular_price) }}"
                                            class="form-control">
                                    </div>
                                </div>

                                {{-- Discount / Tax / Selling --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-md-4">
                                        <label>Discount Type</label>
                                        <select name="discount_type" id="discount_type" class="form-control">
                                            <option disabled>--Select--</option>
                                            <option value="flat"
                                                {{ old('discount_type', $product->discount_type) == 'flat' ? 'selected' : '' }}>
                                                Flat</option>
                                            <option value="percentage"
                                                {{ old('discount_type', $product->discount_type) == 'percentage' ? 'selected' : '' }}>
                                                Percentage</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Discount Amount</label>
                                        <input type="number" name="discount_amount" id="discount_amount"
                                            value="{{ old('discount_amount', $product->discount_amount) }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tax (%)</label>
                                        <input type="number" name="tax" id="tax"
                                            value="{{ old('tax', $product->tax) }}" class="form-control">
                                    </div>
                                </div>

                                {{-- Meta --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-md-12">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title"
                                            value="{{ old('meta_title', $product->meta_title) }}" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Meta Keys</label>
                                        <input type="text" name="meta_keys"
                                            value="{{ old('meta_keys', $product->meta_keys) }}" class="form-control">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control summernote">{{ old('meta_description', $product->meta_description) }}</textarea>
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="row p-5 border-bottom">
                                    <div class="col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1"
                                                {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Publish
                                            </option>
                                            <option value="0"
                                                {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Unpublish
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Featured</label><br>
                                        <input type="checkbox" name="is_featured" value="1"
                                            {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}> Yes
                                    </div>
                                </div>

                                {{-- Buttons --}}
                                <div class="row p-5 border-bottom">
                                    <div class="text-end mt-4">
                                        <a href="{{ route('product.view') }}" class="btn btn-outline-danger">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                let categoryId = $(this).val();
                let subCategoryDropdown = $('#sub_category_id');

                subCategoryDropdown.empty().append('<option value="empty" selected disabled>---</option>');

                if (!categoryId || categoryId === 'empty') {
                    return; 
                }

                $.ajax({
                    url: "{{ route('product.get_subcategories_by_category') }}", 
                    data: {
                        category_id: categoryId
                    },
                    beforeSend: function() {
                        subCategoryDropdown.html('<option>Loading...</option>');
                    },
                    success: function(response) {
                        subCategoryDropdown.empty().append(
                            '<option value="empty" selected disabled>---</option>');
                        if (response.length > 0) {
                            $.each(response, function(key, subCategory) {
                                subCategoryDropdown.append(
                                    `<option value="${subCategory.id}">${subCategory.title}</option>`
                                );
                            });
                        } else {
                            subCategoryDropdown.append(
                                '<option disabled>No subcategory found</option>');
                        }
                    },
                    error: function() {
                        subCategoryDropdown.empty().append(
                            '<option disabled>Error loading subcategories</option>');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const fields = ["stocks", "t_unit_price", "regular_price", "discount_type", "discount_amount", "tax"];
            const purchaseInput = document.getElementById("purchase_price");
            const sellingInput = document.getElementById("selling_price");
            const roundBtn = document.getElementById("round-toggle");
            const form = document.querySelector("form");

            const calculateLive = () => {
                const stocks = parseFloat(document.getElementById("stocks").value) || 0;
                const t_unit_price = parseFloat(document.getElementById("t_unit_price").value) || 0;
                const regular_price = parseFloat(document.getElementById("regular_price").value) || 0;
                const discount_type = document.getElementById("discount_type").value;
                const discount_amount = parseFloat(document.getElementById("discount_amount").value) || 0;
                const tax = parseFloat(document.getElementById("tax").value) || 0;

                let purchase_price = (stocks > 0 && t_unit_price > 0) ? t_unit_price / stocks : 0;
                purchaseInput.value = purchase_price.toFixed(2);

                let discounted_price = regular_price;
                if (discount_type === "flat") discounted_price -= discount_amount;
                if (discount_type === "percentage") discounted_price -= (regular_price * (discount_amount /
                    100));
                if (discounted_price < 0) discounted_price = 0;

                let selling_price = discounted_price + (discounted_price * (tax / 100));
                sellingInput.value = selling_price.toFixed(2);
            };

            fields.forEach(id => {
                const el = document.getElementById(id);
                el.addEventListener("input", calculateLive);
                el.addEventListener("change", calculateLive);
            });

            roundBtn.addEventListener("click", () => {
                const val = parseFloat(sellingInput.value) || 0;
                sellingInput.value = Math.round(val);
            });

            form.addEventListener("submit", async (e) => {
                e.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await fetch("{{ route('product.ajax_calculate_price') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        body: formData,
                    });

                    const data = await response.json();

                    if (response.ok) {
                        // Update UI with validated values
                        purchaseInput.value = data.purchase_price;
                        sellingInput.value = data.selling_price;

                        // ✅ Optionally submit the real form after successful calculation
                        form.submit();
                    } else {
                        alert("Calculation failed. Please check your input.");
                    }
                } catch (error) {
                    console.error(error);
                    alert("Something went wrong while validating prices.");
                }
            });
        });
    </script>



    <!-- Slug Generator -->
    <script>
        document.getElementById('productName').addEventListener('input', function() {
            var slug = this.value.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            document.getElementById('slug').value = slug;
        });
    </script>

    <!-- Dynamic Color & Image Rows -->
    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.add-more-row')) {
                const container = document.getElementById('colorImageContainer');
                const newRow = document.createElement('div');
                newRow.classList.add('row', 'align-items-center', 'mb-2', 'color-image-row');
                newRow.innerHTML = `
                <div class="col-md-4">
                    <label class="form-label">Color</label>
                    <input type="color" class="form-control form-control-color" name="colors[]" value="#000000">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Image</label>
                    <input type="file" name="color_images[]" class="form-control dropify" accept="image/*" data-bs-height="100" >
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-danger w-100 remove-row"><i class="fe fe-trash-2"></i> Remove</button>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-success w-100 add-more-row"><i class="fe fe-plus"></i> Add More</button>
                </div>
            `;
                container.appendChild(newRow);
            }

            if (e.target.closest('.remove-row')) {
                e.target.closest('.color-image-row').remove();
            }
        });
    </script>
@endsection

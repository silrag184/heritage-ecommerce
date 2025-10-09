@extends('admin-panel.layout.app')

@section('title', 'Edit Product')

@section('admin-content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <<div class="page-header">
                    <div>
                        <h1 class="page-title">Add Product</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('product.view') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                        </ol>
                    </div>
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
                                        <div class="form-group">
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
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <div class="form-group">
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
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="form-label text-muted">Brand <span
                                                    class="text-danger">*</span></label>
                                            <select name="brand_id" id="brand_id"
                                                class="form-control select2 @error('brand_id') is-invalid @enderror"
                                                required>
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



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-muted">Size</label>
                                            <select name="size_id[]" id="size_id" class="form-control select2" multiple
                                                required>
                                                @php
                                                    // Get all selected size IDs from the product's productSizes relation
$selectedSizes = old(
    'size_id',
    $product->productSizes->pluck('size_id')->toArray() ?? [],
                                                    );
                                                @endphp

                                                @foreach ($sizes as $size)
                                                    <option value="{{ $size->id }}"
                                                        {{ in_array($size->id, $selectedSizes) ? 'selected' : '' }}>
                                                        {{ $size->size_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('size_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label text-muted">Tags</label>
                                            <select name="tag_id[]" id="tag_id" class="form-control select2" multiple
                                                required>
                                                @php
                                                    $selectedTags = old(
                                                        'tag_id',
                                                        $product->productTags->pluck('tag_id')->toArray() ?? [],
                                                    );
                                                @endphp
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                        {{ in_array($tag->id, $selectedTags) ? 'selected' : '' }}>
                                                        {{ $tag->tag_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('tag_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
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
                                            @error('attribute_value_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

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
                                                        value="{{ $colorImage->color_code }}"
                                                        class="form-control form-control-color">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Image</label>
                                                    <input type="file" name="color_images[]"
                                                        class="form-control dropify"
                                                        value="{{ asset($colorImage->image_path) }}" data-default-file="{{ asset($colorImage->image_path) }}">
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

                                {{-- Product Price & Stocks --}}
                                <div class="row p-5 border-bottom">
                                    <label class="form-label text-muted">Product Price</label>
                                    <div class="col-12 col-12 row">
                                        <!-- Stocks -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="stocks" class="form-label text-muted">Stocks: <span
                                                        class="text-danger">*</span></label>
                                                <input id="stocks" type="number"
                                                    class="form-control text-dark @error('stocks') is-invalid @enderror"
                                                    name="stocks" value="{{ old('stocks', $product->stocks) }}"
                                                    placeholder="Enter Stocks" required>
                                                @error('stocks')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Unit -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Unit: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('unit_id') is-invalid @enderror"
                                                    id="unit_id" name="unit_id" data-placeholder="Choose Type..."
                                                    required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected disabled>---</option>
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}"
                                                            {{ old('unit_id', $product->unit_id) == $unit->id ? 'selected' : '' }}>
                                                            {{ $unit->unit_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('unit_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Unit Price -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="t_unit_price" class="form-label text-muted">Total Unit
                                                    Price:
                                                    <span class="text-danger">*</span></label>
                                                <input id="t_unit_price" type="number"
                                                    class="form-control text-dark @error('t_unit_price') is-invalid @enderror"
                                                    name="t_unit_price"
                                                    value="{{ old('t_unit_price', $product->t_unit_price) }}"
                                                    placeholder="Enter Total Unit Price" required>
                                                @error('t_unit_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Price Section -->
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="purchase_price" class="form-label text-muted">Purchase
                                                    Price:
                                                    (Per Item) <span class="text-danger">*</span></label>
                                                <input id="purchase_price" type="number"
                                                    class="form-control text-dark @error('purchase_price') is-invalid @enderror"
                                                    name="purchase_price" value="{{ old('purchase_price') }}"
                                                    placeholder="Enter Purchase Price" readonly>
                                                @error('purchase_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="regular_price" class="form-label text-muted">Regular
                                                    Price:
                                                    <span class="text-danger">*</span></label>
                                                <input id="regular_price" type="number"
                                                    class="form-control text-dark @error('regular_price') is-invalid @enderror"
                                                    name="regular_price"
                                                    value="{{ old('regular_price', $product->regular_price) }}"
                                                    placeholder="Enter Regular Price" required>
                                                @error('regular_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--Discount Type -->
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="discount_type" class="form-label text-muted">Discount
                                                    Type:</label>
                                                <select id="discount_type" name="discount_type"
                                                    class="form-control @error('discount_type') is-invalid @enderror">
                                                    <option value="" selected disabled>-- Select Type --</option>
                                                    <option value="flat"
                                                        {{ old('discount_type', $product->discount_type) == 'flat' ? 'selected' : '' }}>
                                                        Flat
                                                    </option>
                                                    <option value="percentage"
                                                        {{ old('discount_type', $product->discount_type) == 'percentage' ? 'selected' : '' }}>
                                                        Percentage</option>
                                                </select>
                                                @error('discount_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Discount Amount -->
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="discount_amoun" class="form-label text-muted">Discount
                                                    Amount:</label>
                                                <input id="discount_amount" type="number"
                                                    class="form-control text-dark @error('discount_amount') is-invalid @enderror"
                                                    name="discount_amount"
                                                    value="{{ old('discount_amount', $product->discount_amount) }}"
                                                    placeholder="Enter Discount Amount">
                                                @error('discount_amount')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group ">
                                                <label for="tax" class="form-label text-muted">Tax (%): <span
                                                        class="text-danger">*</span></label>
                                                <input id="tax" type="number"
                                                    class="form-control text-dark @error('tax') is-invalid @enderror"
                                                    name="tax" value="{{ old('tax', $product->tax) }}"
                                                    placeholder="Enter Tax" required>
                                                @error('tax')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="selling_price"
                                                    class="form-label text-muted d-flex justify-content-between align-items-center">
                                                    <span>Selling Price: <span class="text-danger">*</span></span>
                                                    <button type="button" id="round-toggle"
                                                        class="btn btn-sm btn-outline-primary">Round to
                                                        Integer</button>
                                                </label>
                                                <input id="selling_price" type="number" name="selling_price"
                                                    class="form-control text-dark" readonly>
                                            </div>
                                        </div>
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

            // ✅ Live local calculation
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

            // 🔁 Trigger live calc on input/change
            fields.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.addEventListener("input", calculateLive);
                    el.addEventListener("change", calculateLive);
                }
            });

            // 🔘 Round selling price
            if (roundBtn) {
                roundBtn.addEventListener("click", () => {
                    const val = parseFloat(sellingInput.value) || 0;
                    sellingInput.value = Math.round(val);
                });
            }

            // 🚀 On form submit: Validate + calculate from controller
            form.addEventListener("submit", async (e) => {
                e.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await fetch("{{ route('product.ajax_calculate_price') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: formData,
                    });

                    const data = await response.json();

                    if (response.ok && data.purchase_price !== undefined) {
                        // ✅ Update fields with backend-calculated values
                        purchaseInput.value = data.purchase_price;
                        sellingInput.value = data.selling_price;

                        // 🔁 Submit actual form after backend validation passes
                        form.submit();
                    } else {
                        alert("⚠️ Price calculation failed. Please check your inputs.");
                    }
                } catch (error) {
                    console.error("❌ AJAX error:", error);
                    alert("Something went wrong while validating prices.");
                }
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
                if (discount_type === "percentage") discounted_price -= (regular_price * discount_amount / 100);
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
                        purchaseInput.value = data.purchase_price;
                        sellingInput.value = data.selling_price;

                        form.removeEventListener("submit", arguments.callee); // prevent infinite loop
                        form.submit();
                    } else {
                        alert("Calculation failed. Please check your input.");
                    }
                } catch (error) {
                    console.error("❌ AJAX Error:", error);
                    alert("Something went wrong while calculating prices.");
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

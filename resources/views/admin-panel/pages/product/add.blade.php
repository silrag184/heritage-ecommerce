@extends('admin-panel.layout.app')

@section('title')
    Add Product
@endsection

@section('admin-content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                <div class="page-header">
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
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row p-5 border-bottom">
                                        <!-- Product Name -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="productName" class="form-label text-muted">Product Name: <span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input id="productName" type="text"
                                                        class="form-control text-dark @error('product_name') is-invalid @enderror"
                                                        name="product_name" value="{{ old('product_name') }}"
                                                        placeholder="Enter Project Name" required>
                                                    @error('product_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Slug -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="slug" class="form-label text-muted">Slug:</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('slug') is-invalid @enderror" id="slug"
                                                        name="slug" value="{{ old('slug') }}">
                                                    @error('slug')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <small class="form-text text-muted">Leave blank to auto-generate from
                                                    title.</small>
                                            </div>
                                        </div>


                                        <!-- sku -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="slug" class="form-label text-muted">Sku:</label>
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control @error('slug') is-invalid @enderror" id="slug"
                                                        name="slug" value="{{ old('slug') }}">
                                                    @error('slug')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <small class="form-text text-muted">Leave blank to auto-generate from
                                                    title.</small>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row p-5 border-bottom">
                                         <!-- Category -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Product Category: <span
                                                        class="text-danger">*</span></label>
                                                <select
                                                    class="form-control select2 @error('category_id') is-invalid @enderror"
                                                    id="category_id" name="category_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected disabled>---</option>
                                                    @foreach($categories as $category)
                                                        {{-- <option value="{{ $category->id }}">{{$category->name}}</option> --}}
                                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Subcategory -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">SubCategory: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('sub_category_id') is-invalid @enderror" id="sub_category_id"
                                                    name="sub_category_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected disabled>---</option>
                                                    @foreach($subCategories as $subCategory)
                                                        <option value="{{ $subCategory->id }}" {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('sub_category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Brand -->
                                       <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Brand: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('brand_id') is-invalid @enderror" id="brand_id"
                                                    name="brand_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected disabled>---</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                         <!-- Size -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Size: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('size_id') is-invalid @enderror" id="size_id"
                                                    name="size_id[]" multiple data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" disabled>---</option>
                                                    @foreach($sizes as $size)
                                                        <option value="{{ $size->id }}">{{$size->size_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('size_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Tags -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Tags: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('tag_id') is-invalid @enderror" id="tag_id"
                                                    name="tag_id[]" multiple data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" disabled>---</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{$tag->tag_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tag_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="attributes" class="form-label text-muted">Attributes: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control  @error('attribute_value_id') is-invalid @enderror" id="attributes"
                                                    name="attribute_value_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" disabled>---</option>
                                                    @foreach($attributeValues as $attributeValue)
                                                        <option value="{{ $attributeValue->id }}">{{$attributeValue->value}}</option>
                                                    @endforeach
                                                </select>
                                                @error('attribute_value_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                         <!-- Stocks -->
                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="stocks" class="form-label text-muted">Stocks: <span
                                                        class="text-danger">*</span></label>
                                                <input id="stocks" type="number"
                                                    class="form-control text-dark @error('stocks') is-invalid @enderror"
                                                    name="stocks" value="{{ old('stocks') }}" placeholder="Enter Stocks" required>
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
                                                <select class="form-control select2 @error('unit_id') is-invalid @enderror" id="unit_id"
                                                    name="unit_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected disabled>---</option>
                                                    @foreach($units as $unit)
                                                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->unit_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('unit_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="t_unit_price" class="form-label text-muted">Total Unit Price: <span
                                                        class="text-danger">*</span></label>
                                                <input id="t_unit_price" type="number"
                                                    class="form-control text-dark @error('t_unit_price') is-invalid @enderror"
                                                    name="t_unit_price" value="{{ old('t_unit_price') }}" placeholder="Enter Total Unit Price" required >
                                                @error('t_unit_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row p-5 border-bottom">
                                         <!-- Description -->
                                        <div class="col-md-6 col-xl-6 mb-3">
                                            <div class="form-group">
                                                <label for="shortDescription" class="form-label text-muted">Short Description/Summary</label>
                                                <textarea id="shortDescription" name="short_description"
                                                    class="summernote form-control @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
                                                @error('short_descriotion') <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xl-6 mb-3">
                                            <div class="form-group">
                                                <label for="longDescription" class="form-label text-muted">Long Description/Full Details</label>
                                                <textarea id="longDescription" name="long_description"
                                                    class="summernote form-control @error('long_description') is-invalid @enderror">{{ old('long_description') }}</textarea>
                                                @error('long_description') <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row p-5 border-bottom">
                                        <!-- Thumbnail -->
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="thumbnail_image" class="form-label text-muted">Thumbnail
                                                Image</label>
                                            <input type="file" id="thumbnail_image" name="thumbnail_image"
                                                class="dropify @error('thumbnail_image') is-invalid @enderror"
                                                accept="image/*" data-bs-height="100">
                                            @error('thumbnail_image') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <!-- Other Images -->
                                        {{-- <div class="col-md-6 mb-3">
                                            <label for="other_images" class="form-label text-muted">Other Images</label>
                                            <input id="other_images" type="file" name="other_images[]"
                                                class="form-control @error('other_images') is-invalid @enderror"
                                                accept="image/*" multiple>
                                            @error('other_images') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <!-- Colors & Images -->
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label text-muted">Product Colors With Images</label>
                                            <div id="colorImageContainer">
                                                <div class="row align-items-center mb-2 color-image-row">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Color</label>
                                                        <input type="color" name="colors[]" value="#000000"
                                                            class="form-control form-control-color">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Image</label>
                                                        {{-- <input type="file" name="color_images[]" accept="image/*"
                                                            class="form-control" required> --}}
                                                            <input type="file" name="color_images[]"
                                                                class="dropify @error('color_images') is-invalid @enderror"
                                                                accept="image/*" data-bs-height="100">
                                                    </div>
                                                    <div class="col-md-2 mt-4">
                                                        <button type="button" class="btn btn-danger w-100 remove-row">
                                                            <i class="fe fe-trash-2"></i> Remove
                                                        </button>
                                                    </div>
                                                    <div class="col-md-2 mt-4">
                                                        <button type="button" class="btn btn-success w-100 add-more-row">
                                                            <i class="fe fe-plus"></i> Add More
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-5 border-bottom">
                                        <!-- Price Section -->
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="purchase_price" class="form-label text-muted">Purchase Price: <span class="text-danger">*</span></label>
                                                <input id="purchase_price" type="number"
                                                    class="form-control text-dark @error('purchase_price') is-invalid @enderror"
                                                    name="purchase_price" value="{{ old('purchase_price') }}" placeholder="Enter Purchase Price" readonly>
                                                @error('purchase_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="regular_price" class="form-label text-muted">Regular Price: <span
                                                        class="text-danger">*</span></label>
                                                <input id="regular_price" type="number"
                                                    class="form-control text-dark @error('regular_price') is-invalid @enderror"
                                                    name="regular_price" value="{{ old('regular_price') }}" placeholder="Enter Regular Price" required>
                                                @error('regular_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                        <!--Discount Type -->
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="discount_type" class="form-label text-muted">Discount Type:</label>
                                                <select id="discount_type" name="discount_type"
                                                    class="form-control @error('discount_type') is-invalid @enderror">
                                                    <option value="" selected disabled>-- Select Type --</option>
                                                    <option value="flat" {{ old('discount_type') == 'flat' ? 'selected' : '' }}>Flat</option>
                                                    <option value="percentage" {{ old('discount_type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                                </select>
                                                @error('discount_type')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Discount Amount -->
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="discount_amoun" class="form-label text-muted">Discount Amount:</label>
                                                <input id="discount_amount" type="number"
                                                    class="form-control text-dark @error('discount_amount') is-invalid @enderror"
                                                    name="discount_amount" value="{{ old('discount_amount') }}" placeholder="Enter Discount Amount">
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
                                                    name="tax" value="{{ old('tax') }}" placeholder="Enter Tax" required>
                                                @error('tax')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="selling_price" class="form-label text-muted">Selling Price: <span
                                                        class="text-danger">*</span></label>
                                                <input id="selling_price" type="number"
                                                    class="form-control text-dark @error('selling_price') is-invalid @enderror"
                                                    name="selling_price" value="{{ old('selling_price') }}" placeholder="Enter Selling Price" readonly>
                                                @error('selling_price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row p-5 border-bottom">
                                         <!-- Meta Title -->
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="meta_title" class="form-label text-muted">Meta Title</label>
                                                <input type="text" id="meta_title" name="meta_title"
                                                    class="form-control @error('meta_title') is-invalid @enderror"
                                                    value="{{ old('meta_title') }}">
                                                @error('meta_title') <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Meta Description -->
                                        <div class="col-md-12 mb-3">
                                            <div class="form-group">
                                                <label for="meta_description" class="form-label text-muted">Meta
                                                    Description</label>
                                                <textarea id="meta_description" name="meta_description"
                                                    class="form-control summernote @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                                                @error('meta_description') <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-5 border-bottom">
                                        <!-- Status -->
                                        <div class="col-md-6 mb-3">
                                            <label for="status" class="form-label text-muted">Status <span
                                                    class="text-danger">*</span></label>
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Publish
                                                </option>
                                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Unpublish
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Featured -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label text-muted">Is Featured</label>
                                            <div class="form-check">
                                                <input type="checkbox" id="is_featured" name="is_featured"
                                                    class="form-check-input" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                                <label for="is_featured" class="form-check-label">Yes</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-5 border-bottom">
                                        <!-- Submit -->
                                        <div class="text-end mt-4">
                                            <a href="{{ route('product.view') }}" class="btn btn-outline-danger">
                                                <i class="fe fe-x-circle"></i> Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fe fe-check-circle"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Slug Generator -->
    <script>
        document.getElementById('productName').addEventListener('input', function () {
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
    document.addEventListener('click', function (e) {
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
                    <input type="file" name="color_images[]"
                        class="dropify @error('color_images') is-invalid @enderror"
                        accept="image/*" data-bs-height="100">
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-danger w-100 remove-row">
                        <i class="fe fe-trash-2"></i> Remove
                    </button>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="button" class="btn btn-success w-100 add-more-row">
                        <i class="fe fe-plus"></i> Add More
                    </button>
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

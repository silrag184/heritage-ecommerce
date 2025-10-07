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
                                        <div class="col-sm-12 col-md-12 col-xl-3">
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
                                        <div class="col-sm-12 col-md-12 col-xl-3">
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
                                        <div class="col-sm-12 col-md-12 col-xl-3">
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

                                        

                                        <!-- Category -->
                                        <div class="col-sm-12 col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Product Category: <span
                                                        class="text-danger">*</span></label>
                                                <select
                                                    class="form-control select2 @error('category_id') is-invalid @enderror"
                                                    id="category_id" name="category_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected>---</option>
                                                    @foreach($categores as $category)
                                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Subcategory -->
                                        <div class="col-sm-12 col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">SubCategory: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('sub_category_id') is-invalid @enderror" id="sub_category_id"
                                                    name="sub_category_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected>---</option>
                                                    @foreach($subCategores as $subCategory)
                                                        <option value="{{ $subCategory->id }}">{{$subCategory->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('sub_category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Brand -->
                                        <div class="col-sm-12 col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Brand: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('brand_id') is-invalid @enderror" id="brand_id"
                                                    name="brand_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected>---</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                         <!-- Unit -->
                                        <div class="col-sm-12 col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Unit: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('unit_id') is-invalid @enderror" id="unit_id"
                                                    name="unit_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected>---</option>
                                                    @foreach($units as $unit)
                                                        <option value="{{ $unit->id }}">{{$unit->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('unit_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                         <!-- Unit -->
                                        <div class="col-sm-12 col-md-12 col-xl-3">
                                            <div class="form-group">
                                                <label for="" class="form-label text-muted">Unit: <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control select2 @error('tag_id') is-invalid @enderror" id="tag_id"
                                                    name="tag_id" data-placeholder="Choose Type..." required>
                                                    <option label="Choose one"></option>
                                                    <option value="empty" selected>---</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('tag_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Description -->
                                        <div class="col-md-6 mb-3">
                                            <label for="description" class="form-label text-muted">Description</label>
                                            <textarea id="description" name="description"
                                                class="summernote form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <!-- Thumbnail -->
                                        <div class="col-md-6 mb-3">
                                            <label for="thumbnail_image" class="form-label text-muted">Thumbnail
                                                Image</label>
                                            <input type="file" id="thumbnail_image" name="thumbnail_image"
                                                class="dropify @error('thumbnail_image') is-invalid @enderror"
                                                accept="image/*" data-bs-height="100">
                                            @error('thumbnail_image') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Other Images -->
                                        <div class="col-md-6 mb-3">
                                            <label for="other_images" class="form-label text-muted">Other Images</label>
                                            <input id="other_images" type="file" name="other_images[]"
                                                class="form-control @error('other_images') is-invalid @enderror"
                                                accept="image/*" multiple>
                                            @error('other_images') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Colors & Images -->
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label text-muted">Product Colors & Images</label>
                                            <div id="colorImageContainer">
                                                <div class="row align-items-center mb-2 color-image-row">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Color</label>
                                                        <input type="color" name="colors[]" value="#000000"
                                                            class="form-control form-control-color">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Image</label>
                                                        <input type="file" name="color_images[]" accept="image/*"
                                                            class="form-control" required>
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

                                        <!-- Meta Title -->
                                        <div class="col-md-6 mb-3">
                                            <label for="meta_title" class="form-label text-muted">Meta Title</label>
                                            <input type="text" id="meta_title" name="meta_title"
                                                class="form-control @error('meta_title') is-invalid @enderror"
                                                value="{{ old('meta_title') }}">
                                            @error('meta_title') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Tags -->
                                        <div class="col-md-6 mb-3">
                                            <label for="tags" class="form-label text-muted">Tags</label>
                                            <input type="text" id="tags" name="tags"
                                                class="form-control @error('tags') is-invalid @enderror"
                                                value="{{ old('tags') }}" placeholder="e.g. web development, design">
                                            @error('tags') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <!-- Meta Description -->
                                        <div class="col-md-12 mb-3">
                                            <label for="meta_description" class="form-label text-muted">Meta
                                                Description</label>
                                            <textarea id="meta_description" name="meta_description"
                                                class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                                            @error('meta_description') <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

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
                    <input type="file" class="form-control" name="color_images[]" accept="image/*" required>
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

@extends('admin-panel.layout.app')

@section('title')
Add Product
@endsection

@section('admin-content')
<div class="app-content main-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
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
            <!-- PAGE-HEADER END -->

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
                                    <div class="col-sm-12 col-md-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="productName" class="form-label text-muted">Product Name: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="productName" type="text" class="form-control text-dark @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" placeholder="Enter Project Name" required>
                                                @error('product_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="slug" class="form-label text-muted">Slug:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <small class="form-text text-muted">Leave blank to auto-generate from title.</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="" class="form-label text-muted">Product Category: <span class="text-danger">*</span></label>
                                            <select class="form-control select2 @error('category_id') is-invalid @enderror" id="" name="" data-placeholder="Choose Type..." required>
                                                <option label="Choose one"></option>
                                                <option value="empty" selected>---</option>
                                                @foreach( as )
                                                    <option value="" ></option>
                                                @endforeach
                                            </select>
                                            @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="" class="form-label text-muted">SubCategory: <span class="text-danger">*</span></label>
                                            <select class="form-control select2 @error('') is-invalid @enderror" id="" name="" data-placeholder="Choose Type..." required>
                                                <option label="Choose one"></option>
                                                <option value="empty" selected>---</option>
                                                @foreach( )
                                                    <option value=""></option>
                                                @endforeach
                                            </select>
                                            @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="" class="form-label text-muted">hjkldfghdbvh: <span class="text-danger">*</span></label>
                                            <select class="form-control select2 @error('') is-invalid @enderror" id="" name="" data-placeholder="Choose Type..." required>
                                                <option label="Choose one"></option>
                                                <option value="empty" selected>---</option>
                                                @foreach($technologies as $technology)
                                                    <option value=""></option>
                                                @endforeach
                                            </select>
                                            <small class="form-text text-muted">e.g.</small>
                                            @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="" class="form-label text-muted"> <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input id="" type="text" class="form-control text-dark @error('') is-invalid @enderror" name="" value="" placeholder="Enter Client Name" required>
                                                @error()
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-md-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label"></label>
                                            <textarea class="summernote form-control @error('') is-invalid @enderror" name="" id="">{{ old('') }}</textarea>
                                            @error('')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-md-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description" id="description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-6">
                                        <label for="thumbnail_image" class="form-label text-muted">Thumbnail Image: </label>
                                        <div class="form-group">
                                            <input type="file" class="dropify @error('thumbnail_image') is-invalid @enderror" id="thumbnail_image" name="thumbnail_image" accept="image/*" data-bs-height="100" />
                                            @error('thumbnail_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-6">
                                        <label for="other_images" class="form-label text-muted">Other Images: </label>
                                        <div class="form-group">
                                            <input id="other_images" type="file" class="form-control @error('other_images') is-invalid @enderror" name="other_images[]" accept="image/jpeg,image/png,image/jpg,image/gif" multiple />
                                            @error('other_images')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div id="other_images_preview" class="mt-3"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="meta_title" class="form-label text-muted">Meta Title: </label>
                                            <div class="input-group">
                                                <input id="meta_title" type="text" class="form-control text-dark @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}">
                                                @error('meta_title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="tags" class="form-label text-muted">Tags: </label>
                                            <div class="input-group">
                                                <input id="tags" type="text" class="form-control text-dark @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" placeholder="e.g. web development, portfolio">
                                                @error('tags')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="meta_description" class="form-label text-muted">Meta Description: </label>
                                            <div class="input-group">
                                                <textarea class="form-control content @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" row="1">{{ old('meta_description') }}</textarea>
                                                @error('meta_description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Publish</option>
                                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Unpublish</option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Is Featured</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_featured">
                                                    Yes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row p-5">
                                    <div class="btn-list text-end">
                                        <a href="{{ route('product.view') }}" class="btn btn-outline-danger">
                                            <i class="fe fe-x-circle"></i>
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fe fe-check-circle"></i>
                                            Save
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
<script>
// Auto-generate slug from productName
    document.getElementById('productName').addEventListener('input', function() {
        var productName = this.value;
        var slug = productName.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
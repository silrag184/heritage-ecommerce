@extends('admin-panel.layout.app')

@section('title')
Edit Brand
@endsection

@section('admin-content')

    <!--app-content open-->
    <div class="app-content main-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">


                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Brand Form</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Edit Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Brand</h4>
                                <a href="{{ route('brands.index') }}" class="btn btn-secondary ms-auto d-block">Back to List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="brandName" class="form-label">Brand Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brandName" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}" required>
                                                @error('brand_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $brand->slug) }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">Leave blank to auto-generate from title.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $brand->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="brandLogo" class="form-label">Brand Logo (160px /160px MAX)</label>
                                                <input type="file" class="form-control @error('brandLogo') is-invalid @enderror" id="brandLogo" name="brand_logo" accept="image/*">
                                                @error('brandLogo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">Allowed formats: JPEG, PNG, JPG, GIF, WEBP, AVIF. Max size: 1MB.</small>
                                                @if($brand->brand_logo)
                                                    <div class="mt-2">
                                                        <img src="{{ asset($brand->brand_logo) }}" alt="{{ $brand->brand_name }}" width="100" height="100">
                                                        <p class="mt-1">Current Image</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                    <option value="1" {{ old('status', $brand->status) == 1 ? 'selected' : '' }}>Publish</option>
                                                    <option value="0" {{ old('status', $brand->status) == 0 ? 'selected' : '' }}>Unpublish</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancel</a>
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
    // Auto-generate slug from brandLogo
    document.getElementById('brandName').addEventListener('input', function() {
        var brandName = this.value;
        var slug = brandName.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection

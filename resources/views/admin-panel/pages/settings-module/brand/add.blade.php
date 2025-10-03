@extends('admin-panel.layout.app')

@section('title')
Add Brand
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Add Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
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
                                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="brandName" class="form-label">Brand Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brandName" name="brand_name" value="{{ old('brand_name') }}" required>
                                                @error('brand_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">Leave blank to auto-generate from title.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
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
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
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
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Create</button>
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

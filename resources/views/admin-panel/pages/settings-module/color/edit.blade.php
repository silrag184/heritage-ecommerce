@extends('admin-panel.layout.app')

@section('title')
Edit Color
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
                        <h1 class="page-title">Color Form</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Edit Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Color</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Color</h4>
                                <a href="{{ route('color.view') }}" class="btn btn-secondary ms-auto d-block">Back to List</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('color.update', $color->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="colorName" class="form-label">Color Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('color_name') is-invalid @enderror" id="colorName" name="color_name" value="{{ old('color_name', $color->color_name) }}" required>
                                                @error('color_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="colorCode" class="form-label">Color Code <span class="text-danger">*</span></label>
                                                <input type="color" class="form-control form-control-color @error('color_code') is-invalid @enderror" id="colorCode" name="color_code" value="{{ old('color_code', $color->color_code) }}" required>
                                                @error('color_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $color->slug) }}">
                                                @error('slug')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="form-text text-muted">Leave blank to auto-generate from title.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $color->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                    <option value="1" {{ old('status', $color->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $color->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Update Color</button>
                                            <a href="{{ route('color.view') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                    <div class="mb-3">
                                        <label>Color Preview</label>
                                        <div id="colorPreview" style="width: 50px; height: 30px; border: 1px solid #ccc; background-color: {{ old('color_code', $color->color_code) }};"></div>
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
    // Auto-generate slug from title
    document.getElementById('colorName').addEventListener('input', function() {
        var colorName = this.value;
        var slug = colorName.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('slug').value = slug;
    });

    // Update color preview on color code change
    document.getElementById('colorCode').addEventListener('input', function() {
        document.getElementById('colorPreview').style.backgroundColor = this.value;
    });
</script>
@endsection
